<?php

namespace App\Models;

use CodeIgniter\Model;

class Quiz_m extends Model
{
    protected $table      = 'bdd_quiz_quiz';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = false;

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


}