<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Menampilkan halaman beranda.
     */
    public function home()
    {
        return view('pages.home');
    }

    /**
     * Menampilkan halaman struktur organisasi.
     */
    public function struktur()
    {
        // Data struktur kepengurusan ini nantinya akan diambil dari database.
        // Untuk saat ini, kita definisikan langsung di sini sebagai contoh.
        $pengurus = [
            'KETUA UMUM' => 'Nama Ketua Umum',
            'WAKIL KETUA UMUM' => 'Nama Wakil Ketua Umum',
            'SEKRETARIS UMUM' => 'Nama Sekretaris Umum',
            'BENDAHARA UMUM' => 'Nama Bendahara Umum',
            'KOORDINATOR DIVISI INOVASI DAN RISET (IRIS)' => 'Nama Koordinator IRIS',
            'KOORDINATOR DIVISI HUMAS DAN ADVOKASI (HUMADVO)' => 'Nama Koordinator HUMADVO',
            'KOORDINATOR DIVISI KADERISASI' => 'Nama Koordinator Kaderisasi',
            'KOORDINATOR DIVISI EKONOMI KREATIF (EKRAF)' => 'Nama Koordinator EKRAF',
            'KOORDINATOR DIVISI KESEKTARIATAN' => 'Nama Koordinator Kesekretariatan',
        ];

        return view('pages.struktur', ['pengurus' => $pengurus]);
    }
}
