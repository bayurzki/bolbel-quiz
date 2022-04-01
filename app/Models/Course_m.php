<?php

namespace App\Models;

use CodeIgniter\Model;

class Course_m extends Model
{
    protected $table      = 'bdd_quiz_courses';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['title', 'sub_title','create_at', 'create_by','updated_at','deleted_at'];

    protected $useTimestamps = false;
    protected $createdField  = 'create_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

    function get_cdetail($id_course){
        $db = db_connect();
        $builder = $db->table('bdd_quiz_cdetail');
        $builder->select('*');
        $builder->join('bdd_quiz_courses', 'bdd_quiz_courses.id = bdd_quiz_cdetail.id_course');
        $query   = $builder->getWhere(['bdd_quiz_courses.id' => $id_course]);
        $quizd = $query->getResult();

        return $quizd;
    }
}