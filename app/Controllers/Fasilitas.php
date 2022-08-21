<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelFasilitas;

class Fasilitas extends BaseController
{
    public function index()
    {
        $fasilitas = new ModelFasilitas();
        $data = [
            'tampildata' => $fasilitas->findAll(),
            'title' => 'Data Fasilitas'
        ];
        return view('admin/fasilitas/index', $data);
    }
    public function store()
    {

        helper(['form', 'url']);

        $model = new ModelFasilitas();

        $data = [
            'first_name' => $this->request->getVar('txtFname'),
            'last_name'  => $this->request->getVar('txtLname'),
            'address'  => $this->request->getVar('txtAddress'),
            'email'  => $this->request->getVar('txtEmail'),
            'mobile'  => $this->request->getVar('txtMobile'),
        ];
        $save = $model->insert($data);
        return redirect()->to(base_url('student'));
    }
}