<?php

namespace App\Controllers;

use App\Models\Mtempat;
use App\Models\Mkecamatan;

class Tempat extends BaseController
{
    protected $tempatmodel;
    public function __construct()
    {
        $this->tempatmodel = new Mtempat();
        $this->KecamatanModel = new Mkecamatan();
    }
    public function index()
    {
        $tempat   = $this->tempatmodel->join('kecamatan', 'tempat_wisata.id_kecamatan = kecamatan.id_kecamatan')->findAll();
        $data = [
            'title' => 'Data Tempat Wisata',
            'tempat_wisata' => $tempat
        ];
        return view('admin/tempat/index', $data);
    }

    public function create()
    {
        $kecamatan   = $this->KecamatanModel->findAll();
        $data = [
            'title' => 'Tambah Data Tempat Wisata',
            'kecamatan' => $kecamatan
        ];
       
        return view('admin/tempat/create', $data);
        $this->load->helper('form_validation');
    }


    public function simpan()
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

    public function edit($id)
    {
        $kecamatan   = $this->KecamatanModel->findAll();
        $tempat   = $this->tempatmodel->join('kecamatan', 'tempat_wisata.id_kecamatan = kecamatan.id_kecamatan')->find($id);
        $data = [
            'title' => 'Edit Data Tempat Wisata',
            'tempat' => $tempat,
            'kecamatan' => $kecamatan
        ];

        return view('admin/tempat/update', $data);
    }

    public function update($id)
    {
        helper(['form', 'url']);
        $this->tempatmodel->update($id, [

            'nama_tempat'        => $this->request->getVar('tempat'),
            'id_kecamatan'        => $this->request->getVar('id_kecamatan'),
            'keterangan_tempat'        => $this->request->getVar('keterangan'),
            'jarak'        => $this->request->getVar('jarak'),
        ]);
        return redirect()->to('/tempat');
    }

    public function delete($id)
    {

        $this->tempatmodel->delete($id);
        return redirect()->to('/tempat');
    }
}