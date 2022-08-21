<?php

namespace App\Controllers;

use App\Models\Mtempat;
use App\Models\Mkecamatan;
use App\Models\Mwisata;
use App\Models\MJenis;
use App\Models\ModelFasilitas;

class Wisata extends BaseController
{
    protected $tempatmodel;
    public function __construct()
    {
        $this->tempatmodel = new Mtempat();
        $this->KecamatanModel = new Mkecamatan();
        $this->Wisatamodel = new Mwisata();
        $this->Jenismodel = new Mjenis();
        $this->fasilitasmodel = new ModelFasilitas();
    }
    public function index()
    {
        $objek   = $this->Wisatamodel->join('jenis_wisata', 'object_wisata.id_jenis = jenis_wisata.id_jenis')->join('fasilitas', 'object_wisata.id_fasilitas = fasilitas.id_fasilitas')->join('tempat_wisata', 'object_wisata.id_tempat = tempat_wisata.id_tempat')->findAll();
        $data = [
            'title' => 'Data Objek Wisata',
            'objek_wisata' => $objek
        ];

        return view('admin/wisata/index', $data);
    }

    public function create()
    {
        $jenis   = $this->Jenismodel->findAll();
        $tempat   = $this->tempatmodel->findAll();
        $fasilitas   = $this->fasilitasmodel->findAll();
        $data = [
            'title' => 'Tambah Data Objek Wisata',
            'jenis' => $jenis,
            'tempat' => $tempat,
            'fasilitas' => $fasilitas
        ];
        return view('admin/wisata/create', $data);
    }


    public function simpan()
    {

        helper(['form', 'url']);
        $this->Wisatamodel->save([

            'nama_wisata'    => $this->request->getVar('nama_wisata'),
            'id_jenis'    => $this->request->getVar('id_jenis'),
            'id_tempat' => $this->request->getVar('id_tempat'),
            'id_fasilitas'        => $this->request->getVar('id_fasilitas'),
            'longitude'        => $this->request->getVar('longitude'),
            'latitude'        => $this->request->getVar('latitude'),
            'foto'        => $this->request->getVar('foto'),
            'keterangan'        => $this->request->getVar('keterangan'),

        ]);


        return redirect()->to('/wisata');
    }

    public function edit($id)
    {
        $kecamatan   = $this->KecamatanModel->findAll();
        $tempat   = $this->Wisatamodel->join('kecamatan', 'tempat_wisata.id_kecamatan = kecamatan.id_kecamatan')->find($id);
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
        $this->Wisatamodel->update($id, [

            'nama_wisata'    => $this->request->getVar('nama_wisata'),
            'id_jenis'    => $this->request->getVar('id_jenis'),
            'id_tempat' => $this->request->getVar('id_tempat'),
            'id_fasilitas'        => $this->request->getVar('id_fasilitas'),
            'longitude'        => $this->request->getVar('longitude'),
            'latitude'        => $this->request->getVar('latitude'),
            'foto'        => $this->request->getVar('foto'),
            'keterangan'        => $this->request->getVar('keterangan'),
        ]);
        return redirect()->to('/tempat');
    }

    public function delete($id)
    {

        $this->Wisatamodel->delete($id);
        return redirect()->to('/tempat');
    }
}