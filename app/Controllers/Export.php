<?php

namespace App\Controllers;

class Export extends BaseController{
    public function index(): string
    {
        $data = array(
            'isi'   => 'v_export',
        );
        return view('Layout/v_wrapper', $data);
    }
}
