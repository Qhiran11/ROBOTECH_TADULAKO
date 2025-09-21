<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\PengurusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rute Publik
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/struktur-organisasi', [PageController::class, 'struktur'])->name('struktur');

// Rute Autentikasi Admin
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


// Grup Rute Admin (dilindungi oleh middleware auth)
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Rute untuk mengelola Struktur Organisasi (Pengurus)
    Route::get('/pengurus', [PengurusController::class, 'index'])->name('admin.pengurus.index');
    Route::get('/pengurus/{pengurus}/edit', [PengurusController::class, 'edit'])->name('admin.pengurus.edit');
    Route::put('/pengurus/{pengurus}', [PengurusController::class, 'update'])->name('admin.pengurus.update');
});