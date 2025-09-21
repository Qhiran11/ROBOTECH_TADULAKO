<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimKri extends Model
{
    use HasFactory;
    protected $table = 'tim_kri';
    protected $fillable = ['partisipasi_kri_id', 'nama_mahasiswa', 'jenis_tim'];

    public function partisipasi()
    {
        return $this->belongsTo(PartisipasiKri::class);
    }
}