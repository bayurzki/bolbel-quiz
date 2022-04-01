<?php

namespace App\Models;

use CodeIgniter\Model;

class Quiz_m extends Model
{
    protected $table      = 'bdd_quiz_quiz';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_course','title', 'sub_title','duration','passing_grade','random_question', 'create_at', 'create_by','updated_at','deleted_at'];

    protected $useTimestamps = false;
    protected $createdField  = 'create_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

    function get_qdetail($id_quiz){
        $db = db_connect();
        $builder = $db->table('bdd_quiz_qdetail');
        $builder->select('*');
        $builder->join('bdd_quiz_question', 'bdd_quiz_question.id = bdd_quiz_qdetail.id_question');
        $query   = $builder->getWhere(['id_quiz' => $id_quiz]);
        $quizd = $query->getResult();

        return $quizd;
    }

    function get_all_wques(){
        $db = db_connect();
        $query = $db->query("
            SELECT *, (SELECT COUNT(*) FROM bdd_quiz_qdetail WHERE bdd_quiz_qdetail.id_quiz = bdd_quiz_quiz.id) AS total_question
            FROM bdd_quiz_quiz
            ");
        $quizd = $query->getResult('array');

        return $quizd;

    }

    function get_detail_wques($id_quiz){
        $db = db_connect();
        $query = $db->query("
            SELECT *, (SELECT COUNT(*) FROM bdd_quiz_qdetail WHERE bdd_quiz_qdetail.id_quiz = bdd_quiz_quiz.id) AS total_question
            FROM bdd_quiz_quiz
            WHERE bdd_quiz_quiz.id = '$id_quiz'
            ");
        $quizd = $query->getRow();

        return $quizd;
    }
}