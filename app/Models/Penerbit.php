<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    protected $table = 'penerbit';

    protected $guarded = ['id'];

    public function bukus()
    {
        return $this->hasMany(Buku::class, 'penerbit_id');
    }
}
