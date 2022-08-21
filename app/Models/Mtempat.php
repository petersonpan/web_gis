<?php

namespace App\Models;

use CodeIgniter\Model;

class Mtempat extends Model
{
    protected $table      = 'tempat_wisata';
    protected $primaryKey = 'id_tempat';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_tempat', 'id_kecamatan', 'keterangan_tempat', 'jarak'];
}