<?php

namespace App\Models;

use CodeIgniter\Model;

class Mkecamatan extends Model
{
    protected $table      = 'kecamatan';
    protected $primaryKey = 'id_kecamatan';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_kecamatan', 'keterangan'];

}