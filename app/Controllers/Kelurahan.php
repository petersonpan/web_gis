<?php

namespace App\Controllers;

class Kelurahan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data Kelurahan'
        ];
        return view('admin/kelurahan', $data);
    }
}