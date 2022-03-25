<?php

namespace App\Controllers;
use App\Models\quiz_m;

class Home extends BaseController
{
    protected $helpers = ['array_helper']; 
    public function __construct()
    {
        $this->quiz = new quiz_m();
    }
    public function index()
    {
        echo view('header');
        echo "welcome";
        echo view('footer');
    }

    public function tes(){
        echo view('layout_be');
    }
}
