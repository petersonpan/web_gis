<?php

namespace App\Controllers;

class Tempat extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data Tempat'
        ];
        return view('admin/tempat/index', $data);
    }
}