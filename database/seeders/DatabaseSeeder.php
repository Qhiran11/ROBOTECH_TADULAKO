<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil PengurusSeeder
        $this->call([
            PengurusSeeder::class,
            DivisiSeeder::class, // <-- TAMBAHKAN INI
        ]);
        

        // Buat satu user admin untuk login
        User::factory()->create([
            'name' => 'Admin Robotech',
            'email' => 'admin@robotechuntad.com',
            'password' => Hash::make('password'), // Ganti 'password' dengan password yang aman
        ]);
    }
}
