<?php

namespace App\Models;

use CodeIgniter\Model;

class Mjenis extends Model
{
    protected $table      = 'jenis_wisata';
    protected $primaryKey = 'id_jenis';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_jenis', 'keterangan'];

}