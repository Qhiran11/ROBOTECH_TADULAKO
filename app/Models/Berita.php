<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // TAMBAHKAN BARIS INI
    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
    ];
}