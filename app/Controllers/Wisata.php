<?php

namespace App\Controllers;

class Wisata extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data Wisata'
        ];
        return view('admin/wisata/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Data Wisata'
        ];
        return view('admin/wisata/create', $data);
    }

    public function store()
    {

        helper(['form', 'url']);
        $this->tempatmodel->save([

            'nama_tempat'    => $this->request->getVar('nama_tempat'),
            'id_kecamatan'    => $this->request->getVar('id_kecamatan'),
            'keterangan_tempat' => $this->request->getVar('keterangan'),
            'jarak'        => $this->request->getVar('jarak')
        ]);
        return redirect()->to('/tempat');
    }
}