<?php namespace App\Models;

use CodeIgniter\Model;

class Model_kategorii extends Model{
   public function all_data() {
    return $this->db->table('tbl_kategori')
    ->get()->getResultArray();
   } 
}