<?php

namespace App\Controllers;
use App\Models\Model_user;



class Profile extends BaseController{
    protected $Model_profile;
    protected $Model_user;

    public function __construct()
    {
        $this->Model_user = new Model_user();
        helper('form');
    }
    public function index() {
        $data = array(
            'title' => 'Profile',
            'user' => $this->Model_user->all_data(),
            'isi'   => 'profile/v_profile',
        );
        return view('Layout/v_wrapper', $data);
    }
}
