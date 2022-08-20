<?php

namespace App\Controllers;

class Wisata extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data Wisata'
        ];
        return view('admin/wisata/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Data Wisata'
        ];
        return view('admin/wisata/create', $data);
    }
}