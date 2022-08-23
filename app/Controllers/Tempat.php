<?php

namespace App\Controllers;

use App\Models\Mtempat;
use App\Models\Mkecamatan;

class Tempat extends BaseController
{
    protected $tempatmodel;
    public function __construct()
    {
        $this->tempatmodel = new Mtempat();
        $this->KecamatanModel = new Mkecamatan();
    }
    public function index()
    {
        $tempat   = $this->tempatmodel->join('kecamatan', 'tempat_wisata.id_kecamatan = kecamatan.id_kecamatan')->findAll();
        $data = [
            'page' => 'tempat_wisata',
            'title' => 'Data Tempat Wisata',
            'tempat_wisata' => $tempat
        ];
        return view('admin/tempat/index', $data);
    }

    public function create()
    {
        $kecamatan   = $this->KecamatanModel->findAll();
        $data = [
            'title' => 'Tambah Data Tempat Wisata',
            'page' => 'tempat_wisata',
            'kecamatan' => $kecamatan
        ];

        return view('admin/tempat/create', $data);
        $this->load->helper('form_validation');
    }


    public function simpan()
    {


        $validate = $this->validate([
            'nama_tempat' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' =>   'Data Harus Diisi.',
                    'min_length' => 'Data harus diisi minimal 3 karakter.',
                ]
            ],

            'keterangan_tempat' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' =>   'Data Harus Diisi.',
                    'min_length' => 'Data harus diisi minimal 3 karakter.',
                ]
            ],
            'jarak' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' =>   'Data Harus Diisi.',
                    'min_length' => 'Data  harus diisi minimal 3 karakter.',
                ]
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput()->with('error', 'Mohon cek kembali data inputan anda');
        }




        helper(['form', 'url']);
        $this->tempatmodel->save([

            'nama_tempat'    => $this->request->getVar('nama_tempat'),
            'id_kecamatan'    => $this->request->getVar('id_kecamatan'),
            'keterangan_tempat' => $this->request->getVar('keterangan_tempat'),
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
            'page' => 'tempat_wisata',
            'tempat' => $tempat,
            'kecamatan' => $kecamatan
        ];

        return view('admin/tempat/update', $data);
    }

    public function update($id)
    {

        $validate = $this->validate([
            'nama_tempat' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' =>   'Data Harus Diisi.',
                    'min_length' => 'Data harus diisi minimal 3 karakter.',
                ]
            ],

            'keterangan_tempat' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' =>   'Data Harus Diisi.',
                    'min_length' => 'Data harus diisi minimal 3 karakter.',
                ]
            ],
            'jarak' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' =>   'Data Harus Diisi.',
                    'min_length' => 'Data  harus diisi minimal 3 karakter.',
                ]
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput()->with('error', 'Mohon cek kembali data inputan anda');
        }



        helper(['form', 'url']);
        $this->tempatmodel->update($id, [

            'nama_tempat'            => $this->request->getVar('nama_tempat'),
            'id_kecamatan'           => $this->request->getVar('id_kecamatan'),
            'keterangan_tempat'      => $this->request->getVar('keterangan_tempat'),
            'jarak'                  => $this->request->getVar('jarak'),
        ]);
        return redirect()->to('/tempat');
    }

    public function delete($id)
    {

        $this->tempatmodel->delete($id);
        return redirect()->to('/tempat');
    }
}