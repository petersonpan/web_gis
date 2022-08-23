<?php

namespace App\Controllers;

use App\Models\Madmin;

class Admin extends BaseController
{
    protected $admin;
    public function __construct()
    {
        $this->adminModel = new Madmin();
    }
    public function index()
    {
        $admin   = $this->adminModel->findAll();
        $data = [
            'page'      =>  'Admin',
            'title'     => 'Data admin',
            'admin'     => $admin,
        ];
        return view('admin/administrator/index', $data);
    }

    public function create()
    {

       $data = [
            'page' => 'fasilitas',
            'title' => 'Tambah Data admin'
        ];
        return view('admin/administrator/create', $data);
    }

    public function simpan()
    {

       $validate=$this->validate([
        'username'=>[
            'rules'=>'required|min_length[3]',
            'errors'=>[
                'required' =>   'Data Harus Diisi.',
                'min_length' => 'Data keterangan minimal 3 karakter.',
            ]
            ],
            'password'=>[
                'rules'=>'required|min_length[5]',
                'errors'=>[
                    'required' =>   'Data Harus Diisi.',
                    'min_length' => '{field}  minimal 5 karakter.',
                ],
        ]
       ]);

       if(!$validate){
        return redirect()->back()->withInput()->with('error','Mohon cek kembali data inputan anda');
       }

        helper(['form', 'url']);
        $this->adminModel->save([
            'username'        => $this->request->getVar('username'),
            'password'        => $this->request->getVar('password')
        ]);
        // session()->flashdata('pesan', 'data berhasil di tambah.');
        return redirect()->to('/administrator')->with('success', 'Data fasilitas berhasil disimpan');
    }

    public function edit($id)
    {

        $admin   = $this->adminModel->find($id);
        $data = [
            'page' => 'Admin',
            'title' => 'Edit Data Admin',
            'admin' => $admin
        ];

        return view('admin/administrator/update', $data);
    }
    public function update($id)
    {

        $validate=$this->validate([
            'username'=>[
                'rules'=>'required|min_length[3]',
                'errors'=>[
                    'required' =>   'Data Harus Diisi.',
                    'min_length' => 'Data keterangan minimal 3 karakter.',
                ]
                ],
                'password'=>[
                    'rules'=>'required|min_length[5]',
                    'errors'=>[
                        'required' =>   'Data Harus Diisi.',
                        'min_length' => '{field}  minimal 5 karakter.',
                    ],
            ]
           ]);
    
           if(!$validate){
            return redirect()->back()->withInput()->with('error','Mohon cek kembali data inputan anda');
           }
           
        helper(['form', 'url']);
        $this->adminModel->update($id, [
            'page' => 'fasilitas',
            'username'        => $this->request->getVar('username'),
            'password'        => $this->request->getVar('password')
        ]);
        return redirect()->to('/administrator')->with('success', 'Data fasilitas berhasil diubah');


    }
    public function delete($id)
    {

        $this->adminModel->delete($id);
        return redirect()->to('/administrator')->with('success', 'Data fasilitas berhasil dihapus');
    }
}
