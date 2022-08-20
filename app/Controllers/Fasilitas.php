<?php

namespace App\Controllers;

class Fasilitas extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data Fasilitas'
        ];
        return view('admin/fasilitas/fasilitas', $data);
    }
}