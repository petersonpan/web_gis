<?php

namespace App\Models;

use CodeIgniter\Model;

class Mwisata extends Model
{
    protected $table      = 'object_wisata';
    protected $primaryKey = 'id_wisata';
    protected $useTimestamps = true;

    protected $allowedFields = ['nama_wisata', 'id_jenis', 'nama_tempat', 'nama_fasilitas', 'longitude', 'latitude', 'foto', 'keterangan'];
}
