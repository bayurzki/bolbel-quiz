<?php

namespace App\Models;

use CodeIgniter\Model;

class Global_m extends Model
{
	function insert($table,$data){
        $this->db->table($table)->insert($data);
    }
}