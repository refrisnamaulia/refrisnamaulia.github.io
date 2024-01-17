<?php

namespace App\Controllers;
use App\Models\Model_arsip;
use App\Models\Model_dep;
use App\Models\Model_user;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Arsip extends BaseController
{
    protected $id_arsip;
    protected $Model_arsip;
    protected $Model_dep;
    protected $Model_user;

    public function __construct() {
    $this->Model_arsip = new Model_arsip();
    $this->Model_dep = new Model_dep();
    $this->Model_user = new Model_user();


    helper('form');
    }
  
    public function index(){
        $data = array(
            'title' => 'Surat Masuk',
            'arsip' => $this->Model_arsip->all_data(),  
            'isi'   => 'arsip/v_index'

        );
        return view('Layout/v_wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'title' => 'Tambahkan Laporan Kearsipan',
            'arsip' => $this->Model_arsip->all_data(),
            'isi'   => 'arsip/v_add'

        );
        return view('Layout/v_wrapper', $data);
    }
    public function insert() {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'tgl_terima' => [
                'label' => 'Tanggal Terima',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib Di Isi'
                ]
            ],
            'no_surat' => [
                'label' => 'Kode Surat',
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
            'alamat_pengirim' => [
                'label' => 'Alamat Pengirim',
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
            'jlh_lampiran' => [
                'label' => 'Lampiran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib Di Isi',
                ]
            ],
            'keterangan' => [
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
                    'tgl_terima' => $this->request->getPost('tgl_terima'),
                    'no_surat' => $this->request->getPost('no_surat'),
                    'tgl_surat' => $this->request->getPost('tgl_surat'),
                    'alamat_pengirim' => $this->request->getPost('alamat_pengirim'),
                    'perihal' => $this->request->getPost('perihal'),
                    'jlh_lampiran' => $this->request->getPost('jlh_lampiran'),
                    'keterangan' => $this->request->getPost('keterangan'),
                    'kode_arsip' => $this->request->getPost('kode_arsip'),
                    'id_dep' => session()->get('id_dep'),
                    'id_user' => session()->get('id_user'),
                );
                $this->Model_arsip->add($data);
            }else{
                $nama_file = $file_arsip->getRandomName();
                $data = array(
                    'tgl_terima' => $this->request->getPost('tgl_terima'),
                    'no_surat' => $this->request->getPost('no_surat'),
                    'tgl_surat' => $this->request->getPost('tgl_surat'),
                    'alamat_pengirim' => $this->request->getPost('alamat_pengirim'),
                    'perihal' => $this->request->getPost('perihal'),
                    'jlh_lampiran' => $this->request->getPost('jlh_lampiran'),
                    'keterangan' => $this->request->getPost('keterangan'),
                    'kode_arsip' => $this->request->getPost('kode_arsip'),
                    'id_dep' => session()->get('id_dep'),
                    'id_user' => session()->get('id_user'),
                    'file_arsip' => $nama_file,
                );
                $file_arsip->move('file_arsip', $nama_file);
                $this->Model_arsip->add($data);
            }
            
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan');
            return redirect()->to(base_url('arsip'));
        } else {
            //jikatdkvalid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('arsip/add'));
        }
    }
    public function edit($id_arsip){
        $data = array(
            'title' => 'Edit Arsip',
            'dep' => $this->Model_dep->all_data(),
            'user' => $this->Model_user->all_data(),
            'arsip' => $this->Model_arsip->detail_data($id_arsip),
            'isi'   => 'arsip/v_edit'

        );
        return view('Layout/v_wrapper', $data);
    }
    public function update($id_arsip) {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'tgl_terima' => [
                'label' => 'Tanggal Terima',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib Di Isi'
                ]
            ],
            'no_surat' => [
                'label' => 'Kode Surat',
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
            'alamat_pengirim' => [
                'label' => 'Alamat Pengirim',
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
            'jlh_lampiran' => [
                'label' => 'Lampiran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib Di Isi',
                ]
            ],
            'keterangan' => [
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
                    'id_arsip'=> $id_arsip,
                    'tgl_terima' => $this->request->getPost('tgl_terima'),
                    'no_surat' => $this->request->getPost('no_surat'),
                    'tgl_surat' => $this->request->getPost('tgl_surat'),
                    'alamat_pengirim' => $this->request->getPost('alamat_pengirim'),
                    'perihal' => $this->request->getPost('perihal'),
                    'jlh_lampiran' => $this->request->getPost('jlh_lampiran'),
                    'keterangan' => $this->request->getPost('keterangan'),
                    'kode_arsip' => $this->request->getPost('kode_arsip'),
                    'id_dep' => session()->get('id_dep'),
                    'id_user' => session()->get('id_user'),
                );
                $this->Model_arsip->edit($data);
            }else{
                $nama_file = $file_arsip->getRandomName();
                $data = array(
                    'id_arsip'=> $id_arsip,
                    'tgl_terima' => $this->request->getPost('tgl_terima'),
                    'no_surat' => $this->request->getPost('no_surat'),
                    'tgl_surat' => $this->request->getPost('tgl_surat'),
                    'alamat_pengirim' => $this->request->getPost('alamat_pengirim'),
                    'perihal' => $this->request->getPost('perihal'),
                    'jlh_lampiran' => $this->request->getPost('jlh_lampiran'),
                    'keterangan' => $this->request->getPost('keterangan'),
                    'kode_arsip' => $this->request->getPost('kode_arsip'),
                    'id_dep' => session()->get('id_dep'),
                    'id_user' => session()->get('id_user'),
                    'file_arsip' => $nama_file,
                );
                $file_arsip->move('file_arsip', $nama_file);
                $this->Model_arsip->edit($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil Di Update');
            return redirect()->to(base_url('arsip'));

        } else {
            //jikatdkvalid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('arsip/edit/' . $id_arsip));
        }
    }


    public function delete($id_arsip) {
        $data = array(
            'id_arsip' => $id_arsip,
        );
        $this->Model_arsip->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect()->to(base_url('arsip'));
    }
    public function showAllData($id_arsip){
        $data = array(
            'title' => 'Detail Laporan',
            'dep' => $this->Model_dep->all_data(),
            'user' => $this->Model_user->all_data(),
            'arsip' => $this->Model_arsip->detail_data($id_arsip),
            'isi'   => 'arsip/v_view'

        );
        $this->Model_arsip->show_data($data);
        return view('Layout/v_wrapper', $data);
    }
    public function view($id_arsip){
        $data = array(
            'title' => 'View Arsip Surat Masuk',
            'arsip' => $this->Model_arsip->detail_data($id_arsip),
            'isi'   => 'arsip/v_view'

        );
        return view('Layout/v_wrapper', $data);
    }
    public function export() {
        $data = array(
        'isi'   => 'arsip/v_export'
        );
    }
}