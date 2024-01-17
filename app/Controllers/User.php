<?php

namespace App\Controllers;

use App\Models\Model_user;
use App\Models\Model_dep;

class User extends BaseController {
    protected $Model_user;
    protected $id_user;
    protected $Model_dep;
    public function __construct()
    {
        $this->Model_user = new Model_user();
        $this->Model_dep = new Model_dep();
        helper('form');
    }
    public function index(): string
    {
        $data = array(
            'title' => 'User',
            'user' => $this->Model_user->all_data(),
            'isi'   => 'user/v_index'

        );
        return view('Layout/v_wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'title' => 'Add User',
            'dep' => $this->Model_dep->all_data(),
            'isi'   => 'user/v_add'

        );
        return view('Layout/v_wrapper', $data);
    }
    public function insert()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di Isi'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required' => '{field} wajib di Isi',
                    'min_length' => '{field} minimal terdiri dari 4 karakter'
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|is_unique[tbl_user.email]',
                'errors' => [
                    'required' => '{field} wajib di Isi',
                    'is_unique' => '{field} Sudah Ada, Silahkan Masukkan Email Lainnya'
                ]
            ],
            'level' => [
                'label' => 'Level',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di Isi'
                ]
            ],
            'id_dep' => [
                'label' => 'Departemen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di Isi'
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} wajib di Isi',
                    'mime_in' => 'Format {field} Wajib PNG, JPG, JPEG',
                ]
            ],
        ]);
        $request = \Config\Services::request();
        $data = ($request->getPost());

        if ($validation->run($data)) {
            $foto = $this->request->getFile('foto');
            $nama_file = $foto->getRandomName();               
            //jikavalid
            $data = array(
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'level' => $this->request->getPost('level'),
                'id_dep' => $this->request->getPost('id_dep'),
                'foto' => $nama_file,
            );
            $this->Model_user->add($data);
            $foto->move('foto', $nama_file);
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan');
            return redirect()->to(base_url('user'));
        } else {
            //jikatdkvalid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user/add'));
        }
    }
    public function edit($id_user){
        $data = array(
            'title' => 'Edit User',
            'dep' => $this->Model_dep->all_data(),
            'user' => $this->Model_user->detail_data($id_user),
            'isi'   => 'user/v_edit'

        );
        return view('Layout/v_wrapper', $data);
    }
    public function update($id_user) {
            $validation = \Config\Services::validation();
            $validation->setRules([
                'nama_user' => [
                    'label' => 'Nama User',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib di Isi'
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required|min_length[4]',
                    'errors' => [
                        'required' => '{field} wajib di Isi',
                        'min_length' => '{field} minimal terdiri dari 4 karakter'
                    ]
                ],
                'level' => [
                    'label' => 'Level',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib di Isi'
                    ]
                ],
                'id_dep' => [
                    'label' => 'Departemen',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib di Isi'
                    ]
                ],
                'foto' => [
                    'label' => 'Foto',
                    'rules' => 'mime_in[foto,image/png,image/jpg,image/jpeg]',
                    'errors' => [
                        'mime_in' => 'Format {field} Wajib PNG, JPG, JPEG',
                    ]
                ],
            ]);
            $request = \Config\Services::request();
            $data = ($request->getPost());
    
            if ($validation->run($data)) {
                $foto = $this->request->getFile('foto');
                if($foto->getError()==4){
                    $data = array(
                        'id_user' =>$id_user,
                        'nama_user' => $this->request->getPost('nama_user'),
                        'password' => $this->request->getPost('password'),
                        'level' => $this->request->getPost('level'),
                        'id_dep' => $this->request->getPost('id_dep'),
                    );
                    $this->Model_user->edit($data);
                }else {
                    $nama_file = $foto->getRandomName();
                    $data = array(
                        'id_user' =>$id_user,
                        'nama_user' => $this->request->getPost('nama_user'),
                        'password' => $this->request->getPost('password'),
                        'level' => $this->request->getPost('level'),
                        'id_dep' => $this->request->getPost('id_dep'),
                        'foto' => $nama_file,
                    );
                    $foto->move('foto', $nama_file);
                    $this->Model_user->edit($data);
                }
                
                session()->setFlashdata('pesan', 'Data Berhasil Di Update');
                return redirect()->to(base_url('user'));
            } else {
                //jikatdkvalid
                session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
                // session()->setFlashdata('errors_nama_user', '{nama_user} Wajib Di Isi');
                // session()->setFlashdata('error_email', '{email} Wajib Di Isi');
                return redirect()->to(base_url('user/edit/' . $id_user));
            }
        
    } 
    public function delete($id_user) {
        $data = array(
            'id_user' => $id_user,
        );
        $this->Model_user->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect()->to(base_url('user'));
    }

}