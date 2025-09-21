<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\PengurusController;
use App\Http\Controllers\Admin\BeritaController; // Tambahkan ini
use App\Http\Controllers\Admin\AnggotaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rute Publik
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/struktur-organisasi', [PageController::class, 'struktur'])->name('struktur');
Route::get('/berita', [PageController::class, 'berita'])->name('berita.index'); // Halaman daftar berita
Route::get('/berita/{slug}', [PageController::class, 'detailBerita'])->name('berita.show'); // Halaman detail berita
Route::get('/anggota', [PageController::class, 'anggota'])->name('anggota.index'); // Tambahkan ini
Route::get('/tentang-kami', [PageController::class, 'tentangKami'])->name('tentang.kami'); // <-- TAMBAHKAN INI
Route::get('/kri', [PageController::class, 'kri'])->name('kri.index'); // <-- TAMBAHKAN INI

// Rute Autentikasi Admin
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Grup Rute Admin
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Rute Pengurus
    Route::get('/pengurus', [PengurusController::class, 'index'])->name('pengurus.index');
    Route::get('/pengurus/{pengurus}/edit', [PengurusController::class, 'edit'])->name('pengurus.edit');
    Route::put('/pengurus/{pengurus}', [PengurusController::class, 'update'])->name('pengurus.update');

    // Rute Berita (CRUD Lengkap)
    Route::resource('berita', BeritaController::class);

    Route::resource('anggota', AnggotaController::class); // Tambahkan ini
});