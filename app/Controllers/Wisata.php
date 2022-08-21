<?php

namespace App\Controllers;

use App\Models\Mtempat;
use App\Models\Mkecamatan;
use App\Models\Mwisata;

class Wisata extends BaseController
{
    protected $tempatmodel;
    public function __construct()
    {
        $this->tempatmodel = new Mtempat();
        $this->KecamatanModel = new Mkecamatan();
        $this->Wisatamodel = new Mwisata();
    }
    public function index()
    {
        $objek   = $this->Wisatamodel->join('jenis_wisata', 'object_wisata.id_jenis = jenis_wisata.id_jenis')->join('tempat_wisata', 'object_wisata.id_tempat = tempat_wisata.id_tempat')->join('fasilitas', 'object_wisata.id_fasilitas = fasilitas.id_fasilitas')->findAll();
        $data = [
            'title' => 'Data Tempat Wisata',
            'objek_wisata' => $objek
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