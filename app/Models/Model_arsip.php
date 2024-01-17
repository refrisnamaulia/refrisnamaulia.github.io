<?php namespace App\Models;
use CodeIgniter\Model;

class Model_arsip extends Model{
   protected $tbl_arsip = 'tbl_arsip';
   protected $id_arsip = 'id_arsip';
   public function all_data() {
    return $this->db->table('tbl_arsip')
    ->join('tbl_user', 'tbl_user.id_user = tbl_arsip.id_user', 'left')
    ->join('tbl_dep', 'tbl_dep.id_dep = tbl_user.id_dep', 'left')
    ->orderBy('id_arsip','DESC')
    ->get()
    ->getResultArray();
   } 
   public function detail_data($id_arsip) {
      return $this->db->table('tbl_arsip')
      ->join('tbl_user', 'tbl_user.id_user = tbl_arsip.id_user', 'left')
      ->join('tbl_dep', 'tbl_dep.id_dep = tbl_user.id_dep', 'left')
      ->where('id_arsip', $id_arsip)
      ->get()
      ->getRowArray();
   } 
   public function add($data) {
      $this->db->table('tbl_arsip')->insert($data);
   }
   public function edit($data) {
      $this->db->table('tbl_arsip')
         ->where('id_arsip', $data['id_arsip'])
         ->update($data);
  }  
   public function delete_data($data) {
      $this->db->table('tbl_arsip')
      ->where('id_arsip', $data['id_arsip'])
      ->delete($data);
   }
}