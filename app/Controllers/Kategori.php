<?php
namespace App\Controllers;
use App\Models\Model_kategori;

class Kategori extends BaseController {
    private Model_kategori $Model_kategori;
    public function __construct() {
        $this->Model_kategori = new Model_kategori;
        helper('form');
    }
    public function index() {
        $data = array(
            'title' => 'Kategori',
            'kategori' => $this->Model_kategori->all_data(),
            'isi'   => 'v_kategori'
        );
        return view('Layout/v_wrapper', $data);
    }
    public function add() {
        $data = array(
            'nama_kategori'=> $this->request->getPost('nama_kategori'),
            'keterangan' => $this->request->getPost('keterangan'),
        );
        
        $this->Model_kategori->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('kategori'));
    }
    public function edit($id_kategori) {
        $data = array (
            'id_kategori' => $id_kategori,
            'nama_kategori'=> $this->request->getPost('nama_kategori'),
            'keterangan'=> $this->request->getPost('keterangan'),

        );
        $this->Model_kategori->edit($data);
        return redirect()->to(base_url('kategori'));
    }    
    public function delete($id_kategori) {
        $data = array(
            'id_kategori' => $id_kategori,
        );
        $this->Model_kategori->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect()->to(base_url('kategori'));
    }
}

