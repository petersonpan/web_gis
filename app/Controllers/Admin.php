<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data Admin'
        ];
        return view('admin/admin', $data);
    }
}
