<?php

namespace App\Controllers;
use App\Models\Mjenis;

class Jenis extends BaseController
{
    protected $jenismodel;
    public function __construct()
    {
        $this->jenismodel= new Mjenis();
    }
    public function index()
    {

       
        $jenis   = $this->jenismodel->findAll();
        $data = [
            'title' => 'Data Jenis wisata',
            'jenis_wisata' => $jenis
        ];
        return view('admin/jenis/index', $data);
    }

    public function create()
    {
        
        $data = [
            'title' => 'Tambah Data Jenis Wisata'
        ];
        return view('admin/jenis/create', $data);
    }


    public function simpan()
    {

        helper(['form', 'url']);
       $this->jenismodel->save([

        'nama_jenis'    => $this->request->getVar('jenis'),
        'keterangan'        => $this->request->getVar('Keterangan')
       ]);
       return redirect()->to('/jenis'); 
    }

    public function edit($id)
    {
        $jenis   = $this->jenismodel->find($id);
        $data = [
            'title' => 'Edit Data jenis',
            'jenis' => $jenis
        ];

        return view('admin/jenis/update', $data);
    }

    public function update($id)
    {
            helper(['form', 'url']);
            $this->jenismodel->update($id,[
                'nama_jenis'        => $this->request->getVar('jenis'),
                'keterangan'        => $this->request->getVar('Keterangan')
            ]);
            return redirect()->to('/jenis'); 
    }

    public function delete($id)
    {
        
        $this->jenismodel->delete($id);
        return redirect()->to('/jenis'); 
    }
}