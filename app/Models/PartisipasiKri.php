<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartisipasiKri extends Model
{
    use HasFactory;
    protected $table = 'partisipasi_kri';
    protected $fillable = [
        'divisi_id', 'tahun', 'nama_tim', 'tema_lomba', 
        'pembimbing', 'lokasi_pertandingan', 'foto_robot', 'file_rulebook'
    ];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function tim()
    {
        return $this->hasMany(TimKri::class);
    }
}