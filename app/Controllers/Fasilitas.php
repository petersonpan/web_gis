<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelFasilitas;

class Fasilitas extends BaseController
{
    protected $komikModel;
    public function __construct()
    {
        $this->fasilitasModel = new ModelFasilitas();
    }
    public function index()
    {


        $fasilitas   = $this->FasilitasModel->findAll();
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
        $this->fasilitasModel->save([

            'nama_fasilitas'    => $this->request->getVar('fasilitas'),
            'keterangan'        => $this->request->getVar('Keterangan')
        ]);
        session()->flashdata('pesan', 'data berhasil di tambah.');
        return redirect()->to('admin/fasilitas/index');
    }

    public function edit($id)
    {

        $this->fasilitasModel->delete($id);
        return redirect()->to('/fasilitas');
    }

    public function delete($id)
    {

        $this->fasilitasModel->delete($id);
        return redirect()->to('/fasilitas');
    }
}