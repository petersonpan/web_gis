<?php

namespace App\Controllers;

use App\Models\Mwisata;

class Home extends BaseController
{
    public function __construct()
    {
        $this->Wisatamodel = new Mwisata();
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
            'title' => 'Dashboard',
            'page' => 'dashboard',
            'objek_wisata' => $objek,
        ];

        return view('admin/home', $data);
    }
}
