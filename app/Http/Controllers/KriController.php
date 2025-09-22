<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class KriController extends Controller
{
    public function index()
    {
        $divisis = Divisi::all();
        return view('pages.kri.index', compact('divisis'));
    }

    public function show($slug, Request $request)
    {
        $divisi = Divisi::where('slug', $slug)->firstOrFail();
        
        $tahun_terpilih = $request->get('tahun', $divisi->partisipasi()->max('tahun'));
        
        $partisipasi = $divisi->partisipasi()
                              ->with('tim')
                              ->where('tahun', $tahun_terpilih)
                              ->first();
                              
        $daftar_tahun = $divisi->partisipasi()->orderBy('tahun', 'desc')->pluck('tahun');

        return view('pages.kri.show', compact('divisi', 'partisipasi', 'daftar_tahun', 'tahun_terpilih'));
    }
}