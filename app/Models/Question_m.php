<?php

namespace App\Models;

use CodeIgniter\Model;

class Question_m extends Model
{
    protected $table      = 'bdd_quiz_question';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['title', 'sub_title', 'type_question', 'create_at', 'create_by'];

    protected $useTimestamps = false;
    protected $createdField  = 'create_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

    function cr_id_question(){
        $q = $this->db->query("SELECT MAX(RIGHT(id,4)) AS kd_max FROM bdd_quiz_question WHERE DATE(create_at)=CURDATE()");
        $kd = "";

        if($q->getNumRows()>0){
            foreach($q->getResult() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        
        return date('ymd').$kd;
    }

    function cr_id_answer(){
        $q = $this->db->query("SELECT MAX(RIGHT(id,4)) AS kd_max FROM bdd_quiz_answer WHERE DATE(create_at)=CURDATE()");
        $kd = "";

        if($q->getNumRows()>0){
            foreach($q->getResult() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        
        return date('ymd').$kd;
    }

    function q_insert($table,$data){
        $this->db->table($table)->insert($data);
    }

    function get_answer($id_question){
        $db = db_connect();
        $builder = $db->table('bdd_quiz_answer');
        $query   = $builder->getWhere(['id_question' => $id_question]);
        return $query->getResult();
    }

    
}