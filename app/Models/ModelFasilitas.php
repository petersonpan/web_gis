<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelFasilitas extends Model
{

    protected $table      = 'fasilitas';
    protected $primaryKey = 'id_fasilitas';


    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    // function __construct()
    // {
    //     $this->db = \Config\Database::connect();
    // }
    // function tampildata()
    // {
    //     return $this->db->table('fasilitas')->get();
    // }
}