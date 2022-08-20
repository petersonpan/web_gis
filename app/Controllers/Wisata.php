<?php

namespace App\Controllers;

class Wisata extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data Wisata'
        ];
        return view('admin/wisata', $data);
    }
}