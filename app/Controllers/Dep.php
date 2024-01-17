<?php
namespace App\Controllers;
use App\Models\Model_dep;

class Dep extends BaseController {
    private Model_dep $Model_dep;
    public function __construct() {
        $this->Model_dep = new Model_dep;
        helper('form');
    }
    public function index() {
        $data = array(
            'title' => 'Departemen',
            'dep' => $this->Model_dep->all_data(),
            'isi'   => 'v_dep'
        );
        return view('Layout/v_wrapper', $data);
    }
    public function add() {
        $data = [
            'nama_dep' => $this->request->getPost('nama_dep'),
        ];
        $this->Model_dep->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('dep'));
    }
    public function edit($id_dep) {
        $data = array (
            'id_dep' => $id_dep,
            'nama_dep'=> $this->request->getPost('nama_dep'),
        );
        $this->Model_dep->edit($data);
        return redirect()->to(base_url('dep'));
    }
    
    public function delete($id_dep) {
        $data = array(
            'id_dep' => $id_dep,
        );
        $this->Model_dep->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect()->to(base_url('dep'));
    }
}

