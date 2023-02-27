<?php

namespace App\Controllers;

use App\Models\Mwisata;
use App\Models\Mtempat;
use App\Models\Mkecamatan;
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
        $objek   = $this->Wisatamodel
            ->join('jenis_wisata', 'object_wisata.id_jenis = jenis_wisata.id_jenis')
            ->select(['object_wisata.*', 'jenis_wisata.nama_jenis'])
            ->findAll();
        $data = [
            'title' => 'Data Objek Wisata',
            'page' => 'wisata',
            'objek_wisata' => $objek,

        ];

        return view('admin/wisata/index', $data);
    }

    public function create()
    {
        session();

        $jenis      = $this->Jenismodel->findAll();
        $tempat     = $this->tempatmodel->findAll();
        $fasilitas  = $this->fasilitasmodel->findAll();
        $objek      = $this->Wisatamodel->findAll();
        $data = [
            'title'     => 'Tambah Data Objek Wisata',
            'jenis'     => $jenis,
            'tempat'    => $tempat,
            'fasilitas' => $fasilitas,
            'validation' => \Config\Services::validation(),
            'page' => 'wisata',
        ];
        return view('admin/wisata/create', $data);
    }



    public function simpan()
    {

        $foto = $this->request->getFile('foto');
        $namafoto = $foto->getRandomName();
        $foto->move('img', $namafoto);
        helper(['form', 'url']);
        $this->Wisatamodel->save([

            'nama_wisata'        => $this->request->getVar('nama_wisata'),
            'id_jenis'           => $this->request->getVar('id_jenis'),
            'nama_tempat'           => $this->request->getVar('nama_tempat'),
            'nama_fasilitas'        => $this->request->getVar('nama_fasilitas'),
            'longitude'          => $this->request->getVar('longitude'),
            'latitude'           => $this->request->getVar('latitude'),
            'foto'               => $namafoto,
            'keterangan'         => $this->request->getVar('keterangan'),

        ]);

        return redirect()->to('/wisata')->with('success', 'Data berhasil tersimpan');
    }

    public function edit($id)
    {


        $jenis   = $this->Jenismodel->findAll();
        $objek   = $this->Wisatamodel
            ->join('jenis_wisata', 'object_wisata.id_jenis = jenis_wisata.id_jenis')
            ->select(['object_wisata.*', 'jenis_wisata.nama_jenis'])
            ->where('object_wisata.id_wisata', $id)->find($id);

        $data = [
            'title' => 'Edit Data Tempat Wisata',
            'objek_wisata' => $objek,
            'jenis' => $jenis,
            'page' => 'wisata',
        ];
        return view('admin/wisata/update', $data);
    }

    public function update($id)
    {
        helper(['form', 'url']);


        $data = [

            'nama_wisata'         => $this->request->getVar('nama_wisata'),
            'id_jenis'            => $this->request->getVar('id_jenis'),
            'nama_tempat'           => $this->request->getVar('nama_tempat'),
            'nama_fasilitas'        => $this->request->getVar('nama_fasilitas'),
            'longitude'           => $this->request->getVar('longitude'),
            'latitude'            => $this->request->getVar('latitude'),
            'keterangan'          => $this->request->getVar('keterangan'),
        ];

        if ($this->request->getVar('foto') != null) {
            $foto = $this->request->getFile('foto');
            $namafoto = $foto->getRandomName();
            $foto->move('img', $namafoto);
            $data['foto'] = $namafoto;
        }

        $this->Wisatamodel->update($id, $data);
        return redirect()->to('/wisata');
    }

    public function delete($id)
    {
        $this->Wisatamodel->delete($id);

        return redirect()->to('/wisata');
    }

    public function map()
    {
        $objek   = $this->Wisatamodel->join('jenis_wisata', 'object_wisata.id_jenis = jenis_wisata.id_jenis')
            ->select(['object_wisata.*', 'jenis_wisata.nama_jenis'])
            ->findAll();
        $data = [
            'title' => 'Map Objek Wisata',
            'page' => 'wisata',
            'objek_wisata' => $objek
        ];
        return view('admin/map', $data);
    }
}
