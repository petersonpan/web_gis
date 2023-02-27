<?php

namespace App\Models;

use CodeIgniter\Model;

class Mrating extends Model
{
    protected $table      = 'rating';
    protected $primaryKey = 'id_rating';
    protected $allowedFields = ['id_wisata', 'rating', 'komentar'];

    static public function checkRating($id_wisata)
    {
        $rating = new Mrating();
        return $rating->where('id_wisata', $id_wisata)->findAll();
    }
}
