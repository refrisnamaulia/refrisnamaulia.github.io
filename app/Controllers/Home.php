<?php

namespace App\Controllers;
use App\Models\Model_home;

class Home extends BaseController{
    protected $Model_home;
    public function __construct(){
        $this->Model_home = new Model_home();
    }
    public function index(): string
    {
        $data = array(
            'title' => 'Home',
            'tot_arsip' => $this->Model_home->tot_arsip(),
            'tot_arsipklr' => $this->Model_home->tot_arsipklr(),
            'tot_user' => $this->Model_home->tot_user(),
            'tot_disposisi' => $this->Model_home->tot_disposisi(),
            'isi'   => 'v_home',
        );
        return view('Layout/v_wrapper', $data);
    }
}
