<?php

namespace App\Controllers;
use App\Models\question_m;
use App\Models\answer_m;
use App\Models\quiz_m;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Rest_api extends BaseController
{
    protected $helpers = ['array_helper']; 
    use ResponseTrait;
    public function __construct()
    {
        $this->question = new question_m();
        $this->answer = new answer_m();
        $this->quiz = new quiz_m();
        $this->id_user = 0; 
    }

    public function index(){
        echo "not found";
    }

    public function get_questions(){
        $data = $this->question->findAll();
        return $this->respond($data);
    }

    public function get_question($id){
        $data = $this->question->find($id);
        if ($data != NULL) {
            return $this->respond($data);
        }else{
            $errors = array(
                'messages' => 'Not found',
                'status' => 400,
                'messages' => 'Data not available'
            );

            return $this->fail($errors);
        }
    }

    public function get_answers(){
        $data = $this->answer->findAll();
        return $this->respond($data);
    }

    public function get_answer($id){
        $data = $this->answer->find($id);
        if ($data != NULL) {
            return $this->respond($data);
        }else{
            $errors = array(
                'messages' => 'Not found',
                'status' => 400,
                'messages' => 'Data not available'
            );

            return $this->fail($errors);
        }
        
    }

    public function get_quiz(){
        $data = $this->quiz->findAll();
        return $this->respond($data);
    }

    public function get_quizd($id){

        $quiz = $this->quiz->find($id);
        if ($quiz != NULL) {
            $quizd = $this->quiz->get_qdetail($id);
            $data = array(
                'q_detail' => $quizd
            );
            
            return $this->respond(array_merge($quiz,$data));
        }else{
            $errors = array(
                'messages' => 'Not found',
                'status' => 400,
                'messages' => 'Data not available'
            );
            $description = 'bbb';
            return $this->fail($errors);
        }
        
    }

}