<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelFasilitas;

class Fasilitas extends BaseController
{
    protected $fasilitas;
    public function __construct()
    {
        $this->FasilitasModel = new ModelFasilitas();
    }
    public function index()
    {


        $fasilitas   = $this->fasilitasModel->findAll();
        $data = [
            'title' => 'Data fasilitas',
            'fasilitas' => $fasilitas
        ];
        return view('admin/fasilitas/index', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Tambah Data Fasilitas'
        ];
        return view('admin/fasilitas/create', $data);
    }


    public function simpan()
    {

        helper(['form', 'url']);
        $this->FasilitasModel->save([
            'keterangan'        => $this->request->getVar('keterangan')
        ]);
        // session()->flashdata('pesan', 'data berhasil di tambah.');
        return redirect()->to('/fasilitas');
    }

    public function edit($id)
    {

        $fasilitas   = $this->FasilitasModel->find($id);
        $data = [
            'title' => 'Edit Data Fasilitas',
            'fasilitas' => $fasilitas
        ];

        return view('admin/fasilitas/update', $data);
    }
    public function update($id)
    {
        helper(['form', 'url']);
        $this->FasilitasModel->update($id, [
            'keterangan'        => $this->request->getVar('Keterangan')
        ]);
        return redirect()->to('/fasilitas');
    }
    public function delete($id)
    {

        $this->FasilitasModel->delete($id);
        return redirect()->to('/fasilitas');
    }
}