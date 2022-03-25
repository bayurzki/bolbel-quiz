<?php

namespace App\Models;

use CodeIgniter\Model;

class Answer_m extends Model
{
    protected $table      = 'bdd_quiz_answer';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_question','content', 'is_correct', 'create_at', 'create_by','updated_at','deleted_at'];

    protected $useTimestamps = false;
    protected $createdField  = 'create_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;


}