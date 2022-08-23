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
        $fasilitas   = $this->FasilitasModel->findAll();
        $data = [
            'page' => 'fasilitas',
            'title' => 'Data Fasilitas',
            'fasilitas' => $fasilitas
        ];
        return view('admin/fasilitas/index', $data);
    }

    public function create()
    {




        $data = [
            'page' => 'fasilitas',
            'title' => 'Tambah Data Fasilitas'
        ];
        return view('admin/fasilitas/create', $data);
    }

    public function simpan()
    {

        $validate = $this->validate([
            'keterangan' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' =>   'Data Harus Diisi.',
                    'min_length' => 'Data keterangan minimal 3 karakter.',
                ]
            ]
        ]);

        if (!$validate) {
            return redirect()->back()->withInput()->with('error', 'Mohon cek kembali data inputan anda');
        }

        helper(['form', 'url']);
        $this->FasilitasModel->save([
            'keterangan'        => $this->request->getVar('keterangan')
        ]);
        // session()->flashdata('pesan', 'data berhasil di tambah.');
        return redirect()->to('/fasilitas')->with('success', 'Data fasilitas berhasil disimpan');
    }

    public function edit($id)
    {

        $fasilitas   = $this->FasilitasModel->find($id);
        $data = [
            'page' => 'fasilitas',
            'title' => 'Edit Data Fasilitas',
            'fasilitas' => $fasilitas
        ];

        return view('admin/fasilitas/update', $data);
    }
    public function update($id)
    {

        $validate = $this->validate([
            'keterangan' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' =>   'Data Harus Diisi.',
                    'min_length' => 'Data keterangan minimal 3 karakter.',
                ]
            ]
        ]);

        if (!$validate) {
            return redirect()->back()->withInput()->with('error', 'Mohon cek kembali data inputan anda');
        }

        helper(['form', 'url']);
        $this->FasilitasModel->update($id, [
            'page' => 'fasilitas',
            'keterangan' => $this->request->getVar('keterangan')
        ]);
        return redirect()->to('/fasilitas')->with('success', 'Data fasilitas berhasil diubah');
    }
    public function delete($id)
    {

        $this->FasilitasModel->delete($id);
        return redirect()->to('/fasilitas')->with('success', 'Data fasilitas berhasil dihapus');
    }
}