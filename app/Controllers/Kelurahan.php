<?php

namespace App\Controllers;
use App\Models\Mkelurahan;

class Kelurahan extends BaseController
{
    protected $komikModel;
    public function __construct()
    {
        $this->KelurahanModel= new Mkelurahan();
    }
    public function index()
    {

       
        $kelurahan   = $this->KelurahanModel->findAll();
        $data = [
            'title' => 'Data kelurahan',
           'kelurahan' => $kelurahan
        ];
        return view('admin/kelurahan/index', $data);
    }

    public function create()
    {
        
        $data = [
            'title' => 'Tambah Data kelurahan'
        ];
        return view('admin/kelurahan/create', $data);
    }


    public function simpan()
    {

        helper(['form', 'url']);
       $this->KelurahanModel->save([

        'nama_kelurahan'    => $this->request->getVar('kelurahan'),
        'keterangan'        => $this->request->getVar('Keterangan')
       ]);
       
       return redirect()->to('/kelurahan'); 
    }

    public function edit($id)
    {
        $kelurahan   = $this->KelurahanModel->find($id);
        $data = [
            'title' => 'Edit Data kelurahan',
            'kelurahan' => $kelurahan
        ];

        return view('admin/kelurahan/update', $data);
    }

    public function update($id)
    {
        helper(['form', 'url']);
        $this->KelurahanModel->update($id,[
 
         'nama_kelurahan'    => $this->request->getVar('kelurahan'),
         'keterangan'        => $this->request->getVar('Keterangan')
        ]);
     return redirect()->to('/kelurahan'); 
    }

    public function delete($id)
    {
        
        $this->KelurahanModel->delete($id);
        return redirect()->to('/kelurahan'); 
    }
}