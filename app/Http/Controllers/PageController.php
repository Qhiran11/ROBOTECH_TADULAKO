<?php

namespace App\Http\Controllers;

use App\Models\Berita; // Tambahkan ini
use App\Models\Anggota; // Tambahkan ini
use App\Models\Pengurus;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // ... (metode home() dan struktur() tetap sama)
    public function home()
    {
        return view('pages.home');
    }

    public function struktur()
    {
        $pengurus = Pengurus::orderBy('urutan', 'asc')->get();
        return view('pages.struktur', ['pengurus' => $pengurus]);
    }

    // --- TAMBAHKAN DUA METODE DI BAWAH INI ---
    /**
     * Menampilkan halaman daftar berita untuk publik.
     */
    public function berita()
    {
        $berita = Berita::latest()->paginate(9); // 9 berita per halaman
        return view('pages.berita.index', compact('berita'));
    }

    /**
     * Menampilkan halaman detail sebuah berita.
     */
    public function detailBerita($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('pages.berita.show', compact('berita'));
    }

    public function anggota()
    {
        $anggotas = Anggota::where('status', 'Aktif')->orderBy('nama_lengkap', 'asc')->paginate(12);
        return view('pages.anggota', compact('anggotas'));
    }
}