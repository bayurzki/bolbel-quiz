<?php

namespace App\Controllers;
use App\Models\question_m;
use App\Models\answer_m;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
//use App\Models\global_m;

class Rest_api extends BaseController
{
    protected $helpers = ['array_helper']; 
    use ResponseTrait;
    public function __construct()
    {
        $this->question = new question_m();
        $this->answer = new answer_m();
        //$this->global = new global_m();
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
        return $this->respond($data);
    }

    public function get_answers(){
        $data = $this->answer->findAll();
        return $this->respond($data);
    }

    public function get_answer($id){
        $data = $this->answer->find($id);
        return $this->respond($data);
    }

}