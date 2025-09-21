<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Str;

    class DivisiSeeder extends Seeder
    {
        public function run(): void
        {
            $divisis = [
                ['nama' => 'Kontes Robot ABU Indonesia', 'singkatan' => 'KRAI', 'deskripsi' => 'Divisi ini mengadaptasi tema dari kompetisi robot internasional ABU Robocon.'],
                ['nama' => 'Kontes Robot Sepak Bola Beroda Indonesia', 'singkatan' => 'KRSBI', 'deskripsi' => 'Kompetisi di mana tim robot otonom beroda saling berhadapan dalam pertandingan sepak bola.'],
                ['nama' => 'Kontes Robot Seni Tari Indonesia', 'singkatan' => 'KRSTI', 'deskripsi' => 'Divisi unik yang memadukan teknologi dengan budaya, di mana robot dirancang untuk menarikan tarian tradisional Indonesia.'],
                ['nama' => 'Kontes Robot SAR Indonesia', 'singkatan' => 'KRSRI', 'deskripsi' => 'Robot dirancang untuk misi pencarian dan penyelamatan (Search and Rescue).'],
                ['nama' => 'Kontes Robot Tematik Indonesia', 'singkatan' => 'KRTMI', 'deskripsi' => 'Divisi dengan tema yang berubah setiap tahunnya, menantang kreativitas mahasiswa.'],
            ];

            foreach ($divisis as $divisi) {
                DB::table('divisis')->insert([
                    'nama_divisi' => $divisi['nama'],
                    'singkatan' => $divisi['singkatan'],
                    'slug' => Str::slug($divisi['singkatan']),
                    'deskripsi' => $divisi['deskripsi'],
                ]);
            }
        }
    }