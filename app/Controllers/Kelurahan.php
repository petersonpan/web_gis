<?php

namespace App\Controllers;
use App\Models\Mkelurahan;

class Kelurahan extends BaseController
{
    protected $komikModel;
    public function __construct()
    {
        $this->KelurahanModel = new Mkelurahan();
    }
    public function index()
    {
        $kelurahan   = $this->KelurahanModel->findAll();
        $data = [
            'title'     => 'Data kelurahan',
            'kelurahan' => $kelurahan
        ];

        return view('admin/kelurahan/index', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Tambah Data Kelurahan'
        ];

        return view('admin/kelurahan/create', $data);
    }


    public function simpan()
    {


        helper(['form', 'url']);
        $this->KelurahanModel->save([


            'nama_kecamatan'    => $this->request->getVar('kelurahan'),
            'keterangan'        => $this->request->getVar('Keterangan')
        ]);
        // session()->flashdata('pesan', 'data berhasil di tambah.');
        return redirect()->to('/kelurahan');
    }

    public function edit($id)
    {


        $this->KelurahanModel->update($id);

        return redirect()->to('/kelurahan');
    }

    public function delete($id)
    {
        $this->KelurahanModel->delete($id);
        return redirect()->to('/kelurahan');
    }
}