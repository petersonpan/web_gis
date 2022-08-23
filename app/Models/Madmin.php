<?php

namespace App\Models;

use CodeIgniter\Model;

class Madmin extends Model
{
    protected $table      = 'admin';
    protected $primaryKey = 'id_admin';
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'password'];
}
