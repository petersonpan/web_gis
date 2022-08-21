<?php

namespace App\Models;

use CodeIgniter\Model;

class Mkelurahan extends Model
{
    protected $table      = 'kelurahan';
    protected $primaryKey = 'id_kelurahan';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_kelurahan', 'keterangan'];

}