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
            ->select(['object_wisata.*', 'jenis_wisata.nama_jenis'])
            ->findAll();
        $data = [
            'title' => 'Dashboard',
            'page' => 'dashboard',
            'objek_wisata' => $objek,
        ];

        return view('admin/home', $data);
    }
}
