<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rute untuk Halaman Beranda
Route::get('/', [PageController::class, 'home'])->name('home');

// Rute untuk Halaman Struktur Organisasi
Route::get('/struktur-organisasi', [PageController::class, 'struktur'])->name('struktur');

// Di sini nanti kita akan tambahkan rute lain seperti Berita, KRI, Anggota, dan Login Admin
