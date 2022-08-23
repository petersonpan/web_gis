<?php

namespace App\Controllers;

use App\Models\Mkecamatan;

class Kecamatan extends BaseController
{
    protected $komikModel;
    public function __construct()
    {
        $this->KecamatanModel = new Mkecamatan();
    }
    public function index()
    {


        $kecamatan   = $this->KecamatanModel->findAll();
        $data = [
            'title' => 'Data Kecamatan',
            'page' => 'kecamatan',
            'kecamatan' => $kecamatan
        ];
        return view('admin/kecamatan/index', $data);
    }

    public function create()
    {

        $data = [
            'page' => 'kecamatan',
            'title' => 'Tambah Data Kecamatan'
        ];
        return view('admin/kecamatan/create', $data);
    }


    public function simpan()
    {

        $validate=$this->validate([
            'kecamatan'=>[
                'rules'=>'required|min_length[3]',
                'errors'=>[
                    'required' =>   'Data Harus Diisi.',
                    'min_length' => 'Data harus diisi minimal 3 karakter.',
                ]
                ],

            'keterangan'=>[
                'rules'=>'required|min_length[3]',
                'errors'=>[
                    'required' =>   'Data Harus Diisi.',
                    'min_length' => 'Data harus diisi minimal 3 karakter.',
                ]
                ],
           ]);
    
           if(!$validate){
            return redirect()->back()->withInput()->with('error','Mohon cek kembali data inputan anda');
           }

        helper(['form', 'url']);
        $this->KecamatanModel->save([
            'nama_kecamatan'    => $this->request->getVar('kecamatan'),
            'keterangan'        => $this->request->getVar('keterangan')
        ]);

        return redirect()->to('/kecamatan');
    }

    public function edit($id)
    {
        $kecamatan   = $this->KecamatanModel->find($id);
        $data = [
            'page' => 'kecamatan',
            'title' => 'Edit Data Kecamatan',
            'kecamatan' => $kecamatan
        ];


        return view('admin/kecamatan/update', $data);
    }

    public function update($id)
    {

        $validate=$this->validate([
            'kecamatan'=>[
                'rules'=>'required|min_length[3]',
                'errors'=>[
                    'required' =>   'Data Harus Diisi.',
                    'min_length' => 'Data harus diisi minimal 3 karakter.',
                ]
                ],

            'keterangan'=>[
                'rules'=>'required|min_length[3]',
                'errors'=>[
                    'required' =>   'Data Harus Diisi.',
                    'min_length' => 'Data harus diisi minimal 3 karakter.',
                ]
                ],
           ]);
    
           if(!$validate){
            return redirect()->back()->withInput()->with('error','Mohon cek kembali data inputan anda');
           }

             $this->KecamatanModel->update($id, [
            'nama_kecamatan'    => $this->request->getVar('kecamatan'),
            'keterangan'        => $this->request->getVar('keterangan'),
        ]);
       
        return redirect()->to('/kecamatan');
    }

    public function delete($id)
    {

        $this->KecamatanModel->delete($id);
        return redirect()->to('/kecamatan');
    }
}
