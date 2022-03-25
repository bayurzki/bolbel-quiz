<?php

namespace App\Controllers;
use App\Models\question_m;
//use App\Models\global_m;

class Quiz extends BaseController
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