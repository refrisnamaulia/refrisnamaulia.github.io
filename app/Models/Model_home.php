<?php namespace App\Models;

use CodeIgniter\Model;

use function PHPUnit\Framework\isNull;

class Model_home extends Model{
    public function tot_arsip() {
       return $this->db->table('tbl_arsip')->countAll();
    } 
    public function tot_arsipklr() {
        return $this->db->table('tbl_arsipkeluar')->countAll();
    } 
    public function tot_user() {
        return $this->db->table('tbl_user')->countAll();
    } 
    public function tot_disposisi() {
        return $this->db->table('tbl_arsip')
        ->where ('diteruskan_kepada', !null)
        ->countAll();
    } 

    public function show() {
        return $this->db->table('tbl_user')
        ->where('nama_user')
        ->get()
        ->getResult();  
     } 
}