<?php

namespace App\Controllers;
use App\Models\Model_nav;

class Nav extends BaseController{
    protected $Model_nav;
    public function __construct()
    {
        $this->Model_nav = new Model_nav();
    }
    public function index(): string
    {
        $data = array(
            'detail_data' => $this->Model_nav->detail_data(),
        );
        return view('Layout/v_wrapper', $data);
    }
}
