<?php

namespace App\Controllers;

use App\Models\Madmin;
use App\Models\Mjenis;
use App\Models\Mrating;
use App\Models\Mwisata;

class User extends BaseController
{
    public function __construct()
    {
        $this->Wisatamodel = new Mwisata();
        $this->Adminmodel = new Madmin();
        $this->Jenis = new Mjenis();
        $this->Rating = new Mrating();
    }
    public function index()
    {
        return view('user/index', ['title' => 'Pariwisata Sabu Raijua | Beranda', 'page' => 'home']);
    }
    public function map()
    {
        $objek   = $this->Wisatamodel
            ->join('jenis_wisata', 'object_wisata.id_jenis = jenis_wisata.id_jenis')
            ->select(['object_wisata.*', 'jenis_wisata.nama_jenis'])
            ->orderBy('object_wisata.id_jenis')
            ->findAll();
        $jenis   = $this->Wisatamodel
        ->join('jenis_wisata', 'object_wisata.id_jenis = jenis_wisata.id_jenis', 'right')
        ->select(['object_wisata.*', 'jenis_wisata.nama_jenis'])
        ->groupBy('object_wisata.id_jenis')
        ->orderBy('object_wisata.id_jenis')
        ->findAll();

        $data = [
            'title' => 'Peta Lokasi Wisata',
            'page' => 'map',
            'objek_wisata' => $objek,
            'jenis_wisata' => $jenis,
        ];
        return view('user/map-user', $data);
    }
    public function kategori()
    {

        $data = [
            'title' => 'Pariwisata Sabu Raijua | Jenis Wisata',
            'page' => 'objek',
            'jenis' => $this->Jenis->findAll(),

        ];
        return view('user/kategori', $data);
    }
    public function objekWisata()
    {
        if ($this->request->getVar('q') != null) {
            $objek   = $this->Wisatamodel
                ->join('jenis_wisata', 'object_wisata.id_jenis = jenis_wisata.id_jenis')
                ->select(['object_wisata.*', 'jenis_wisata.nama_jenis'])
                ->where('jenis_wisata.id_jenis', $this->request->getVar('q'))
                ->findAll();
        } else {
            $objek   = $this->Wisatamodel
                ->join('jenis_wisata', 'object_wisata.id_jenis = jenis_wisata.id_jenis')
                ->select(['object_wisata.*', 'jenis_wisata.nama_jenis'])
                ->findAll();
        }

        $jenis = $this->Jenis->findAll();
        $data = [
            'title' => 'Pariwisata Sabu Raijua | Objek Wisata',
            'page' => 'objek',
            'objek_wisata' => $objek,
            'jenis' => $jenis,

        ];
        return view('user/objek-wisata', $data);
    }


    public function beriRating()
    {
        helper(['form', 'url']);
        $this->Rating->save([

            'id_wisata'    => $this->request->getVar('id_wisata'),
            'rating'        => $this->request->getVar('rating'),
            'komentar'        => $this->request->getVar('komentar')
        ]);

        return redirect()->to('/');
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
