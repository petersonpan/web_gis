<?php

namespace App\Controllers;

class Kecamatan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data Kecamatan'
        ];
        return view('admin/kecamatan/kecamatan', $data);
    }
}