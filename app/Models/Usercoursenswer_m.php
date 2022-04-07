<?php

namespace App\Models;

use CodeIgniter\Model;

class Usercoursenswer_m extends Model
{
    protected $table      = 'bdd_quiz_user_course';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_user','email', 'id_course', 'id_quiz', 'created_at', 'create_by','updated_at','deleted_at'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;


}