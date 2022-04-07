<?php

namespace App\Controllers;
use App\Models\Answer_m;
use App\Models\Question_m;
use App\Models\Quiz_m;
use App\Models\Course_m;
use App\Models\Usercoursenswer_m;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Rest_api extends BaseController
{
    protected $helpers = ['array_helper']; 
    use ResponseTrait;
    public function __construct()
    {
        $this->question = new Question_m();
        $this->answer = new Answer_m();
        $this->quiz = new Quiz_m();
        $this->course = new Course_m();
        $this->usercourse = new Usercoursenswer_m();
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
        $data_detail = $this->answer->where('id_question',$id)->findAll();
        $detail = array(
            'question_detail' => $data_detail
        );
        if ($data != NULL) {
            return $this->respond(array_merge($data, $detail));
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

    public function get_courses(){
        $data = $this->course->findAll();
        return $this->respond($data);
    }

    public function get_course($id){

        $course = $this->course->find($id);
        if ($course != NULL) {
            $coursed = $this->course->get_cdetail($id);
            
            return $this->respond($coursed);
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

    public function add_user_course(){
        $quiz = $this->quiz->find($this->request->getVar('id_quiz'));
        $course = $this->course->find($this->request->getVar('id_course'));
        if ($quiz == NULL OR $course == NULL) {
            $response = [
                'messages' => [
                    'errors' => 'Quiz or Course not found',
                ]
            ];
        }else{
            $data = [
                'id_user' => $this->request->getVar('id_user'),
                'email' => $this->request->getVar('email'),
                'id_course'  => $this->request->getVar('id_course'),
                'id_quiz'  => $this->request->getVar('id_quiz'),
                'created_at'  => $this->request->getVar('created_at'),
            ];
            
            $this->usercourse->insert($data);
            $id_usercourse = $this->usercourse->getInsertID();
            $data_user_answer = array();
            $data_tes = array();
            foreach ($this->request->getVar('user_answer') as $key => $value) {
                $is_correct = $this->cek_answer($value->id_question,urlencode(json_encode($value->answer)),$id_usercourse) ;
                if ($is_correct == 11) {
                    $response = [
                        'messages' => [
                            'errors' => 'Question not found',
                        ]
                    ];

                    $this->usercourse->delete($id_usercourse);
                    return $this->respondCreated($response);
                    die();
                }else{
                    $data_user_answer[] = array(
                        'id_user_course' => $id_usercourse,
                        'id_question' => $value->id_question,
                        'answer' => json_encode($value->answer),
                        'is_correct' => $is_correct,
                        'created_at' => date('Y-m-d H:i:s')
                    );    
                }
                 
            }


            // $data = $this->cek_answer($this->request->getVar('user_answer')[0]->id_question,$this->request->getVar('user_answer')[0]->answer);
            $response = [
                'messages' => [
                    'success' => 'created',
                ],
                'data' => $this->request->getVar()

            ];
        }
        
        return $this->respondCreated($response);
    }

    function cek_answer($id_question,$answer,$id_usercourse){
        $ques = $this->question->find($id_question);
        
        if ($ques != NULL) {
            if ($ques['type_question'] == 0) {
                $correct_answer = $this->answer->where('is_correct', 1)->where('id_question', $id_question)->first();

                if ($answer == $correct_answer['id']) {
                    return 1;
                }else{
                    return 0;
                }
            }elseif ($ques['type_question'] == 1) {
                $correct_answer = $this->answer->where('is_correct', 1)->where('id_question', $id_question)->findAll();
                $correct = array();
                foreach ($correct_answer as $key => $value) {
                    $correct[] = $value['id'];
                }
                $answers = explode(',', $answer);
                if (sizeof(array_diff($correct, $answers)) == 0  ) {
                    return 1;
                }else{
                    return 0;
                }
            }elseif ($ques['type_question'] == 2) {
                $answer = json_decode($answer, TRUE);
                echo "<pre>";
                $correct_answer = $this->answer->where('is_correct', 1)->where('id_question', $id_question)->findAll();
                $correct_content = array();
                //var_dump($correct_answer[0]['content'],$correct_answer[1]['content'],$answer);
                echo "<pre>";
                $datana = array();
                foreach ($correct_answer as $key => $value) {
                    $correct_content = json_decode($value['content'], TRUE);
                    for ($i=0; $i < sizeof($answer); $i++) { 
                        if ($answer[$i]['head'] == $correct_content['head']) {
                            $key_answer = $i;
                        }
                    }
                    $datana[$key] = 0;
                    foreach ($correct_content['body'] as $i => $correct) {
                        foreach ($answer[$key_answer]['body'] as $y => $ans) {
                            //var_dump($correct,$ans);
                            if (strtolower($ans) == strtolower($correct)) {
                                $datana[$key] = 1;
                            }
                        }
                    }
                }
                if (in_array('0', $datana)) {
                    $is_correct = 0;
                }else{
                    $is_correct = 1;
                }
                return $is_correct;
            }else{
                $correct_answer = $this->answer->where('is_correct', 1)->where('id_question', $id_question)->first();
                $correct_answer = strtolower($correct_answer['content']);
                $answer = strtolower($answer);
                if ($correct_answer == $answer) {
                    return 1;
                }else{
                    return 0;
                }
            }
        }else{
            return 11;    
            
        }
        
    }

}