<?php

namespace App\Controllers;

use App\Models\Mwisata;

class User extends BaseController
{
    public function __construct()
    {
        $this->Wisatamodel = new Mwisata();
    }
    public function index()
    {
        return view('user/index');
    }
    public function map()
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
        return view('user/map-user', $data);
    }
    public function objekWisata()
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
        return view('user/objek-wisata', $data);
    }

    public function login()
    {
        $data = [
            'title' => 'Login',

        ];
        return view('login', $data);
    }

    public function authLogin()
    {
    }
}
