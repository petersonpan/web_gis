<?php

namespace App\Controllers;

use App\Models\Madmin;
use App\Models\Mwisata;

class User extends BaseController
{
    public function __construct()
    {
        $this->Wisatamodel = new Mwisata();
        $this->Adminmodel = new Madmin();
    }
    public function index()
    {
        return view('user/index', ['title' => 'Pariwisata Sabu Raijua | Beranda', 'page' => 'home']);
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
            'title' => 'Peta Lokasi Wisata',
            'page' => 'map',
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
            'title' => 'Pariwisata Sabu Raijua | Objek Wisata',
            'page' => 'objek',
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
    public function logout()
    {
        $session = session();
        $session->remove('AdminUsername');
        $session->remove('LoggedAt');
        $session->remove('role');

        return redirect()->to(base_url())->with('success', 'Anda berhasil Log Out');
    }
    public function authLogin()
    {
        $loginAttempt = $this->Adminmodel
            ->where('username', $this->request->getVar('username'))
            ->where('password', $this->request->getVar('password'))
            ->findAll();

        if (count($loginAttempt) > 0) {
            $session = session();
            $loggedUser = [
                'AdminUsername' => $this->request->getVar('username'),
                'LoggedAt' => date('Y-m-d H:s:i'),
                'role' => 'admin',
            ];
            $session->set($loggedUser);

            return redirect()->to('/admin');
        }
        return redirect()->to('/login')->with('error', 'Silahkan cek kembali Username dan Password anda');
    }
}
