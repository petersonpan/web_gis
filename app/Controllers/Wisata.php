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
            ->join('fasilitas', 'object_wisata.id_fasilitas = fasilitas.id_fasilitas')
            ->join('tempat_wisata', 'object_wisata.id_tempat = tempat_wisata.id_tempat')
            ->select(['object_wisata.*', 'tempat_wisata.nama_tempat', 'jenis_wisata.nama_jenis', 'fasilitas.keterangan AS nama_fasilitas'])
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
        $data = [
            'title'     => 'Tambah Data Objek Wisata',
            'jenis'     => $jenis,
            'tempat'    => $tempat,
            'fasilitas' => $fasilitas,
            'validation' => \Config\Services::validation()
        ];
        return view('admin/wisata/create', $data);
    }



    public function simpan()
    {

        if(!$this->validate(
                [
            'nama_wisata'=>[
                'rules'     =>'required | is_unique[object_wisata.nama_wisata]',
                'errors'    =>[
                    'required'=>'{field} tidak boleh kosong',
                    'is_unique'=>'{field} nama sudah terdaftar'
                ]
                ],

            'jenis_wisata'=>[
              'rules'     =>'required | is_unique[object_wisata.id_jenis]',
              'erors'     => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique'=>' {field} nama sudah terdaftar'
              ]

            ],

            'foto'=>[
                'rules' =>'upload[berkas]|mime_in[berkas,image/jpg,image/jpeg,image/gif,image/png] |max size [berkas,2048]',
                'erros' => [
                    'uploaded' =>'harus ada file yang di upload',
                    'mime_in'  =>'file extension harus berupa jpg,jpeg,gif,png',
                    'max_size' =>'ukuran file maksimal 2 MB'
                ]
                ],
      ]))




        $foto = $this->request->getFile('foto');
        $namafoto= $foto->getRandomName();
        $foto->move('img',$namafoto);
        helper(['form', 'url']); 
        $this->Wisatamodel->save([

            'nama_wisata'        => $this->request->getVar('nama_wisata'),
            'id_jenis'           => $this->request->getVar('id_jenis'),
            'id_tempat'          => $this->request->getVar('id_tempat'),
            'id_fasilitas'       => $this->request->getVar('id_fasilitas'),
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
        $tempat   = $this->tempatmodel->findAll();
        $fasilitas   = $this->fasilitasmodel->findAll();
        $objek   = $this->Wisatamodel->join('jenis_wisata', 'object_wisata.id_jenis = jenis_wisata.id_jenis')
            ->join('fasilitas', 'object_wisata.id_fasilitas = fasilitas.id_fasilitas')
            ->join('tempat_wisata', 'object_wisata.id_tempat = tempat_wisata.id_tempat')
            ->where('object_wisata.id_wisata', $id)->find($id);

        $data = [
            'title' => 'Edit Data Tempat Wisata',
            'objek_wisata' => $objek,
            'jenis' => $jenis,
            'page' => 'wisata',
            'tempat' => $tempat,
            'fasilitas' => $fasilitas
        ];
        return view('admin/wisata/update', $data);
    }

    public function update($id)
    {
        helper(['form', 'url']);

        $foto = $this->request->getFile('foto');
        $namafoto = $foto->getRandomName();
        $foto->move('img', $namafoto);
        $this->Wisatamodel->update($id, [

            'nama_wisata'         => $this->request->getVar('nama_wisata'),
            'id_jenis'            => $this->request->getVar('id_jenis'),
            'id_tempat'           => $this->request->getVar('id_tempat'),
            'id_fasilitas'        => $this->request->getVar('id_fasilitas'),
            'longitude'           => $this->request->getVar('longitude'),
            'latitude'            => $this->request->getVar('latitude'),
            'foto'                => $namafoto,
            'keterangan'          => $this->request->getVar('keterangan'),
        ]);
        return redirect()->to('/wisata');
    }

    public function delete($id)
    {
        $this->Wisatamodel->delete($id);

        return redirect()->to('/tempat');
    }

    public function map()
    {
        $objek   = $this->Wisatamodel->join('jenis_wisata', 'object_wisata.id_jenis = jenis_wisata.id_jenis')->join('fasilitas', 'object_wisata.id_fasilitas = fasilitas.id_fasilitas')->join('tempat_wisata', 'object_wisata.id_tempat = tempat_wisata.id_tempat')->findAll();
        $data = [
            'title' => 'Map Objek Wisata',
            'page' => 'wisata',
            'objek_wisata' => $objek
        ];
        return view('admin/map', $data);
    }
}
