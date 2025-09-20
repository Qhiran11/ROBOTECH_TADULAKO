<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengurus')->insert([
            ['jabatan' => 'KETUA UMUM', 'nama' => 'Nama Belum Diatur', 'urutan' => 1],
            ['jabatan' => 'WAKIL KETUA UMUM', 'nama' => 'Nama Belum Diatur', 'urutan' => 2],
            ['jabatan' => 'SEKRETARIS UMUM', 'nama' => 'Nama Belum Diatur', 'urutan' => 3],
            ['jabatan' => 'BENDAHARA UMUM', 'nama' => 'Nama Belum Diatur', 'urutan' => 4],
            ['jabatan' => 'KOORDINATOR DIVISI INOVASI DAN RISET (IRIS)', 'nama' => 'Nama Belum Diatur', 'urutan' => 5],
            ['jabatan' => 'KOORDINATOR DIVISI HUMAS DAN ADVOKASI (HUMADVO)', 'nama' => 'Nama Belum Diatur', 'urutan' => 6],
            ['jabatan' => 'KOORDINATOR DIVISI KADERISASI', 'nama' => 'Nama Belum Diatur', 'urutan' => 7],
            ['jabatan' => 'KOORDINATOR DIVISI EKONOMI KREATIF (EKRAF)', 'nama' => 'Nama Belum Diatur', 'urutan' => 8],
            ['jabatan' => 'KOORDINATOR DIVISI KESEKTARIATAN', 'nama' => 'Nama Belum Diatur', 'urutan' => 9],
        ]);
    }
}
