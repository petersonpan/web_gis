<?php

namespace App\Controllers;
use App\Models\Mwisata;


class Wisata extends BaseController
{

    public function __construct()
    {
        $this->Ob_Wisata = new Mwisata();
    }

    public function index()
    {
        $object_wisata   = $this->Ob_Wisata->join('jenis_wisata','jenis_wisata.id_jenis = object_wisata.id_jenis')->findAll();

        $data = [
            'title' => 'Data Wisata',
            'Object'=>$object_wisata
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