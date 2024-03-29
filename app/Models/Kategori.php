<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'category';
    protected $guarded = ['id'];

    public function bukus()
    {
        return $this->hasMany(Buku::class, 'kategori_id');
    }
}
