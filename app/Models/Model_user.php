<?php namespace App\Models;
use CodeIgniter\Model;

class Model_user extends Model{
   protected $tbl_user = 'tbl_user';
   protected $id_user = 'id_user';
   public function all_data() {
    return $this->db->table('tbl_user')
    ->join('tbl_dep', 'tbl_dep.id_dep = tbl_user.id_dep', 'left')
    ->orderBy('id_user','DESC')
    ->get()
    ->getResultArray();
   } 
   public function detail_data($id_user) {
      return $this->db->table('tbl_user')
      ->join('tbl_dep', 'tbl_dep.id_dep = tbl_user.id_dep', 'left')
      ->where('id_user', $id_user)
      ->get()
      ->getRowArray();
   } 
   public function show_nama($data) {
      return $this->db->table('tbl_user')
      ->where('id_user', $data['nama_user'])
      ->get();
   }
   public function add($data) {
      $this->db->table('tbl_user')->insert($data);
   }
   public function edit($data) {
      $this->db->table('tbl_user')
         ->where('id_user', $data['id_user'])
         ->update($data);
  }  
   public function delete_data($data) {
      $this->db->table('tbl_user')
      ->where('id_user', $data['id_user'])
      ->delete($data);
   }
}