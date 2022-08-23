<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'page' => 'admin',
            'title' => 'Data Admin',
        ];
        return view('admin/admin', $data);
    }
}
