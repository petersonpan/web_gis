<?php

namespace App\Controllers;

class Jenis extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data Jenis'
        ];
        return view('admin/jenis/jenis', $data);
    }
}