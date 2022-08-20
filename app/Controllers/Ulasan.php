<?php

namespace App\Controllers;

class Ulasan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data Ulasan'
        ];
        return view('admin/ulasan/index', $data);
    }
}