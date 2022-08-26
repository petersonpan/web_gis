<?php

namespace App\Controllers;

use App\Models\Mjenis;

class Jenis extends BaseController
{
    protected $jenismodel;
    public function __construct()
    {
        $this->jenismodel = new Mjenis();
    }
    public function index()
    {


        $jenis   = $this->jenismodel->findAll();
        $data = [
            'title' => 'Data Jenis wisata',
            'page' => 'jenis_wisata',
            'jenis_wisata' => $jenis
        ];
        return view('admin/jenis/index', $data);
    }

    public function create()
    {

        $data = [
            'page' => 'jenis_wisata',
            'title' => 'Tambah Data Jenis Wisata'
        ];
        return view('admin/jenis/create', $data);
    }


    public function simpan()
    {

        $validate = $this->validate([
            'keterangan' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' =>   'Data Harus Diisi.',
                    'min_length' => 'Data {field} minimal 3 karakter.',
                ]
            ],

            'jenis' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' =>   'Data Harus Diisi.',
                    'min_length' => 'Data  {field} minimal 3 karakter.',
                ]
            ]
        ]);

        if (!$validate) {
            return redirect()->back()->withInput()->with('error', 'Mohon cek kembali data inputan anda');
        }



        helper(['form', 'url']);
        $this->jenismodel->save([

            'nama_jenis'    => $this->request->getVar('jenis'),
            'keterangan'        => $this->request->getVar('keterangan')
        ]);
        return redirect()->to('/jenis');
    }

    public function edit($id)
    {
        $jenis   = $this->jenismodel->find($id);
        $data = [
            'page' => 'jenis_wisata',
            'title' => 'Edit Data jenis',
            'jenis' => $jenis
        ];

        return view('admin/jenis/update', $data);
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
            ],

            'jenis' => [
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
        $this->jenismodel->update($id, [
            'nama_jenis'        => $this->request->getVar('jenis'),
            'keterangan'        => $this->request->getVar('keterangan')
        ]);
        return redirect()->to('/jenis');
    }

    public function delete($id)
    {

        $this->jenismodel->delete($id);
        return redirect()->to('/jenis');
    }
}
