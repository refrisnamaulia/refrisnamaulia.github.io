<?php namespace App\Models;
use CodeIgniter\Model;

class Model_arsip_keluar extends Model{
   protected $tbl_arsipkeluar = 'tbl_arsipkeluar';
   protected $id_arsipklr = 'id_arsipklr';
   public function all_data() {
    return $this->db->table('tbl_arsipkeluar')
    ->join('tbl_dep', 'tbl_dep.id_dep = tbl_arsipkeluar.id_dep', 'left')
    ->join('tbl_user', 'tbl_user.id_user = tbl_arsipkeluar.id_user', 'left')
    ->orderBy('id_arsipklr','DESC')
    ->get()
    ->getResultArray();
   } 
   public function detail_data($id_arsipklr) {
      return $this->db->table('tbl_arsipkeluar')
      ->join('tbl_dep', 'tbl_dep.id_dep = tbl_arsipkeluar.id_dep', 'left')
      ->join('tbl_user', 'tbl_user.id_user = tbl_arsipkeluar.id_user', 'left')
      ->where('id_arsipklr', $id_arsipklr)
      ->get()
      ->getRowArray();
   } 
   public function add($data) {
      $this->db->table('tbl_arsipkeluar')->insert($data);
   }
   public function edit($data) {
      $this->db->table('tbl_arsipkeluar')
         ->where('id_arsipklr', $data['id_arsipklr'])
         ->update($data);
  }  
   public function delete_data($data) {
      $this->db->table('tbl_arsipkeluar')
      ->where('id_arsipklr', $data['id_arsipklr'])
      ->delete($data);
   }
}