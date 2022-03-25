<?php

namespace App\Controllers;
use App\Models\question_m;
//use App\Models\global_m;

class Dashboard extends BaseController
{
    protected $helpers = ['array_helper']; 
    public function __construct()
    {
        $this->question = new question_m();
        //$this->global = new global_m();
        $this->id_user = 0; 
        $this->tb_quiz = db_connect('default')->table('bdd_quiz_question');
        $this->tb_answ = db_connect('default')->table('bdd_quiz_answer');
    }

    public function index()
    {   
        var_dump("expression");
    }

    public function question(){
        $data['sub_menu'] = 0;
        $data['page_id'] = 1;
        $data['datana'] = $this->question->findAll();
        echo view('header');
        echo view('backend/ques',$data);
        echo view('footer');
    }

    public function question_create(){
        echo view('header');
        echo view('backend/ques_create');
        echo view('footer');
    }

    public function question_view($id){
        $data['ques'] = $this->question->find($id);
        $data['answer'] = $this->question->get_answer($id);
        
        echo view('header');
        if($data['ques']['type_question'] == 0){
            echo view('backend/ques_v_single', $data);
        }elseif ($data['ques']['type_question'] == 1) {
            // code...
        }elseif($data['ques']['type_question'] == 2){
            echo view('backend/ques_v_group', $data);
        }else{
            echo view('backend/ques_v_line', $data);
        }
        echo view('footer');
    }

    public function answer_type(){
        extract($_POST);
        if ($id == 0) {
            echo view('backend/ques_ans_single');
        }elseif ($id == 1) {
            echo view('backend/ques_ans_multi');
        }elseif ($id == 2) {
            echo view('backend/ques_ans_group');
        }else {
            echo view('backend/ques_ans_line');
        }
    }

    public function save_question(){
        extract($_POST);
        
        $id_question = $this->question->cr_id_question();
        $q_data = array(
            'id' => $id_question,
            'title' => $q_title,
            'sub_title' => $q_sub_title,
            'type_question' => $q_type,
            'create_at' => date('Y-m-d H:i:s'),
            'create_by' => $this->id_user
        );
        $this->tb_quiz->insert($q_data);

        if ($q_type == 0 ) { // single question            
            for ($i=0; $i < sizeof($a_content); $i++){
                if ($a_is_correct == $i) {
                    $is_correct[$i] = 1;
                }else{
                    $is_correct[$i] = 0;
                }
                $a_data = array(
                    'id' => $this->question->cr_id_answer(),
                    'id_question' => $id_question,
                    'content' => $a_content[$i],
                    'create_at' => date('Y-m-d H:i:s'),
                    'is_correct' => $is_correct[$i]
                );
                $this->tb_answ->insert($a_data);
            }
        }elseif ($q_type == 1) { // multiple question
            for ($i=0; $i < sizeof($a_content); $i++){
                $is_correct[$i] = 0;
                for ($x=0; $x < sizeof($a_is_correct) ; $x++) { 
                    if ($a_is_correct[$x] == $i) {
                        $is_correct[$i] = 1;
                    }
                }

                $a_data = array(
                    'id' => $this->question->cr_id_answer(),
                    'id_question' => $id_question,
                    'content' => $a_content[$i],
                    'create_at' => date('Y-m-d H:i:s'),
                    'is_correct' => $is_correct[$i]
                );
                $this->tb_answ->insert($a_data);
                var_dump($a_data);
            }
        }elseif ($q_type == 2) {      
            $answers = json_decode($a_content, true);
            
            foreach ($answers as $key => $value) {
                if ($value['is_correct'] == 1) {
                    $content = array(
                        'head'=>$value['head'],
                        'body'=>$value['body']
                    );
                }else{
                    $content = array(
                        'body'=>$value['body']
                    );
                }

                if (sizeof($content['body']) > 0) {
                    $a_data = array(
                        'id' => $this->question->cr_id_answer(),
                        'id_question' => $id_question,
                        'content' => json_encode($content),
                        'create_at' => date('Y-m-d H:i:s'),
                        'is_correct' => $value['is_correct']
                    );
                    $this->tb_answ->insert($a_data);
                    var_dump($a_data);
                }
            }
        }else{
            $answers = json_decode($a_content, true);
            foreach ($answers as $key => $value) {
                $is_correct[$key] = 0;
                foreach ($a_is_correct as $x => $y) {
                    if ($y == $key) {
                        $is_correct[$key] = 1;
                    }
                }

                $a_data = array(
                    'id' => $this->question->cr_id_answer(),
                    'id_question' => $id_question,
                    'content' => $value,
                    'create_at' => date('Y-m-d H:i:s'),
                    'is_correct' => $is_correct[$key]
                );
                $this->tb_answ->insert($a_data);
                //var_dump($a_data);
            }
        }

    }

    public function quiz(){
        $data['datana'] = $this->question->findAll();
        echo view('header');
        echo view('backend/quiz',$data);
        echo view('footer');
    }

    public function quiz_create(){
        $data['questions'] = $this->question->findAll();
        echo view('header');
        echo view('backend/quiz_create',$data);
        echo view('footer');
    }

    public function quiz_view($id){
        $data['ques'] = $this->question->find($id);
        $data['answer'] = $this->question->get_answer($id);
        
        echo view('header');
        echo view('backend/quiz_v', $data);
        echo view('footer');
    }

    public function add_ques_quiz(){
        extract($_POST);
        $data = $this->question->find($id_ques);
        if ($data['type_question'] == 0) {
            $type = 'Single Choice';
        }elseif ($data['type_question'] == 1) {
            $type = 'Multiple Choice';
        }elseif ($data['type_question'] == 1) {
            $type = 'Group Match';
        }else{
            $type = 'Line Match';
        }
        $data = array(
            'id' => $data['id'],
            'title' => $data['title'],
            'sub_title' => $data['sub_title'],
            'type' => $type
        );
        echo json_encode($data);
    }

}