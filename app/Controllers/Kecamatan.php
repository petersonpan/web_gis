<?php

namespace App\Controllers;

use App\Models\Mkecamatan;

class Kecamatan extends BaseController
{
    protected $komikModel;
    public function __construct()
    {
        $this->KecamatanModel= new Mkecamatan();
    }
    public function index()
    {

       
        $kecamatan   = $this->KecamatanModel->findAll();
        $data = [
            'title' => 'Data Kecamatan',
           'kecamatan' => $kecamatan
        ];
        return view('admin/kecamatan/index', $data);
    }

    public function create()
    {
        
        $data = [
            'title' => 'Tambah Data Kecamatan'
        ];
        return view('admin/kecamatan/create', $data);
    }


    public function simpan()
    {

        helper(['form', 'url']);
       $this->KecamatanModel->save([

        'nama_kecamatan'    => $this->request->getVar('kecamatan'),
        'keterangan'        => $this->request->getVar('Keterangan')
       ]);
       
       return redirect()->to('/kecamatan'); 
    }

    public function edit($id)
    {
        $kecamatan   = $this->KecamatanModel->find($id);
        $data = [
            'title' => 'Edit Data Kecamatan',
            'kecamatan' => $kecamatan
        ];

        return view('admin/kecamatan/update', $data);
    }

    public function update($id)
    {
        helper(['form', 'url']);
        $this->KecamatanModel->save($id,[
 
         'nama_kecamatan'    => $this->request->getVar('kecamatan'),
         'keterangan'        => $this->request->getVar('Keterangan')
        ]);
     return redirect()->to('/kecamatan'); 
    }

    public function delete($id)
    {
        
        $this->KecamatanModel->delete($id);
        return redirect()->to('/kecamatan'); 
    }
}