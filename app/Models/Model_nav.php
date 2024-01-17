<?php namespace App\Models;

use CodeIgniter\Model;

class Model_nav extends Model{ 
    protected $tbl_user = 'tbl_user';
    protected $id_user = 'id_user';
    public function detail_data($id_user) {
       return $this->db->table('tbl_user')
       ->where('id_user', $id_user)
       ->get();    
    } 
}