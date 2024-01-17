<?php

namespace App\Controllers;
use App\Models\Model_arsip_keluar;
use App\Models\Model_dep;
use App\Models\Model_user;


class ArsipKeluar extends BaseController
{
    protected $id_arsipklr;
    protected $Model_arsip_keluar;
    protected $Model_dep;
    protected $Model_user;

    public function __construct() {
    $this->Model_arsip_keluar = new Model_arsip_keluar();
    $this->Model_dep = new Model_dep();
    $this->Model_user = new Model_user();


    helper('form');
    }
  
    public function index(): string {
        $data = array(
            'title' => 'Surat Keluar',
            'arsipkeluar' => $this->Model_arsip_keluar->all_data(),  
            'isi'   => 'arsipkeluar/v_index'

        );
        return view('Layout/v_wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'title' => 'Tambahkan Laporan Kearsipan',
            'arsipkeluar' => $this->Model_arsip_keluar->all_data(),
            'isi'   => 'arsipkeluar/v_add'

        );
        return view('Layout/v_wrapper', $data);
    }
    public function insert() {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'no_surat' => [
                'label' => 'Nomor Surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib Di Isi'
                ]
            ],
            'tgl_surat' => [
                'label' => 'Tanggal Surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib Di Isi'
                ]
            ],
            'kepada' => [
                'label' => 'Kepada',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib Di Isi',
                ]
            ],
            'perihal' => [
                'label' => 'Perihal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib Di Isi',
                ]
                ],
            'jlh_lampiranklr' => [
                'label' => 'Lampiran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib Di Isi',
                ]
            ],
            'keterangan_klr' => [
                'label' => 'Keterangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib Di Isi',
                ]
            ],
            'kode_arsip' => [
                'label' => 'Kode Arsip',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib Di Isi',
                ]
            ],
            'file_arsip' => [
                'label' => 'File PDF',
                'rules' => 'ext_in[file_arsip,pdf]',
                'errors' => [
                    'ext_in' => 'Format {field} wajib .PDF',
                ]
            ],
        ]);
        $request = \Config\Services::request();
        $data = ($request->getPost());

        if ($validation->run($data)) {
            //jikavalid
            $file_arsip = $this->request->getFile('file_arsip');
            if($file_arsip->getError()==4){
                $data = array(
                'no_surat' => $this->request->getPost('no_surat'),
                'tgl_surat' => $this->request->getPost('tgl_surat'),
                'kepada' => $this->request->getPost('kepada'),
                'perihal' => $this->request->getPost('perihal'),
                'jlh_lampiranklr' => $this->request->getPost('jlh_lampiranklr'),
                'keterangan_klr' => $this->request->getPost('keterangan_klr'),
                'kode_arsip' => $this->request->getPost('kode_arsip'),
                'id_dep' => session()->get('id_dep'),
                'id_user' => session()->get('id_user'),

            );
            $this->Model_arsip_keluar->add($data);
        }else {
            $nama_file = $file_arsip->getRandomName();
            $data = array(
            'no_surat' => $this->request->getPost('no_surat'),
            'tgl_surat' => $this->request->getPost('tgl_surat'),
            'kepada' => $this->request->getPost('kepada'),
            'perihal' => $this->request->getPost('perihal'),    
            'jlh_lampiranklr' => $this->request->getPost('jlh_lampiranklr'),
            'keterangan_klr' => $this->request->getPost('keterangan_klr'),
            'kode_arsip' => $this->request->getPost('kode_arsip'),
            'id_dep' => session()->get('id_dep'),
            'id_user' => session()->get('id_user'),
            'file_arsip' => $nama_file,
            );
            $file_arsip->move('file_arsip', $nama_file);
            $this->Model_arsip_keluar->add($data);
        }
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan');
            return redirect()->to(base_url('arsipkeluar'));
        } else {
            //jikatdkvalid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('arsipkeluar/add'));
        }
    }
    public function edit($id_arsipklr){
        $data = array(
            'title' => 'Edit Arsip Keluar',
            'dep' => $this->Model_dep->all_data(),
            'user' => $this->Model_user->all_data(),
            'arsipkeluar' => $this->Model_arsip_keluar->detail_data($id_arsipklr),
            'isi'   => 'arsipkeluar/v_edit'

        );
        return view('Layout/v_wrapper', $data);
    }
    public function update($id_arsipklr) {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'no_surat' => [
                'label' => 'Nomor Surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib Di Isi'
                ]
            ],
            'tgl_surat' => [
                'label' => 'Tanggal Surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib Di Isi'
                ]
            ],
            'kepada' => [
                'label' => 'Kepada',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib Di Isi',
                ]
            ],
            'perihal' => [
                'label' => 'Perihal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib Di Isi',
                ]
                ],
            'jlh_lampiranklr' => [
                'label' => 'Lampiran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib Di Isi',
                ]
            ],
            'keterangan_klr' => [
                'label' => 'Keterangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib Di Isi',
                ]
            ],
            'kode_arsip' => [
                'label' => 'Kode Arsip',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib Di Isi',
                ]
            ],
            'file_arsip' => [
                'label' => 'File PDF',
                'rules' => 'ext_in[file_arsip,pdf]',
                'errors' => [
                    'ext_in' => 'Format {field} wajib .PDF',
                ]
            ],
        ]);
        $request = \Config\Services::request();
        $data = ($request->getPost());

        if ($validation->run($data)) {
            $file_arsip = $this->request->getFile('file_arsip');
            if($file_arsip->getError()==4){
            //jikavalid
                $data = array(
                    'id_arsipklr' =>$id_arsipklr,
                    'no_surat' => $this->request->getPost('no_surat'),
                    'tgl_surat' => $this->request->getPost('tgl_surat'),
                    'kepada' => $this->request->getPost('kepada'),
                    'perihal' => $this->request->getPost('perihal'),
                    'jlh_lampiranklr' => $this->request->getPost('jlh_lampiranklr'),
                    'keterangan_klr' => $this->request->getPost('keterangan_klr'),
                    'kode_arsip' => $this->request->getPost('kode_arsip'),
            );
            $this->Model_arsip_keluar->edit($data);
        }else {
            $nama_file = $file_arsip->getRandomName();
            $data = array(
                'id_arsipklr' =>$id_arsipklr,
                'no_surat' => $this->request->getPost('no_surat'),
                'tgl_surat' => $this->request->getPost('tgl_surat'),
                'kepada' => $this->request->getPost('kepada'),
                'perihal' => $this->request->getPost('perihal'),
                'jlh_lampiranklr' => $this->request->getPost('jlh_lampiranklr'),
                'keterangan_klr' => $this->request->getPost('keterangan_klr'),
                'kode_arsip' => $this->request->getPost('kode_arsip'),
                'file_arsip' => $nama_file,
            );
            $file_arsip->move('file_arsip', $nama_file);
            $this->Model_arsip_keluar->edit($data);
        }

            session()->setFlashdata('pesan', 'Data Berhasil Di Update');
            return redirect()->to(base_url('arsipkeluar'));
        } else {
            //jikatdkvalid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('arsipkeluar/edit/' . $id_arsipklr));
        }
    }
    public function delete($id_arsipklr) {
        $data = array(
            'id_arsipklr' => $id_arsipklr,
        );
        $this->Model_arsip_keluar->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect()->to(base_url('arsipkeluar'));
    }
    public function view($id_arsipklr){
        $data = array(
            'title' => 'View Arsip Surat Keluar',
            'arsip' => $this->Model_arsip_keluar->detail_data($id_arsipklr),
            'isi'   => 'arsipkeluar/v_view'

        );
        return view('Layout/v_wrapper', $data);
    }
}