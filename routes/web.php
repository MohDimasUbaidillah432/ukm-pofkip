<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KegiatanController; 
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DashboardController; // Pastikan ini diimpor

Route::get('/', function () {
    return view('welcome');
});

// ROUTE UNTUK DASHBOARD (BISA DIAKSES OLEH SEMUA USER TERAUTENTIKASI)
// Mengganti closure lama dengan DashboardController
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // RESOURCE ROUTE UNTUK KEGIATAN (HANYA UNTUK USER YANG MEMILIKI HAK AKSES ADMIN/MANAJEMEN)
    Route::resource('kegiatan', KegiatanController::class)->names([
        'index' => 'kegiatan.index',
        'create' => 'kegiatan.create',
        'store' => 'kegiatan.store',
        'show' => 'kegiatan.show',
        'edit' => 'kegiatan.edit',
        'update' => 'kegiatan.update',
        'destroy' => 'kegiatan.destroy',
    ]);
    
    // RESOURCE ROUTE UNTUK ANGGOTA (HANYA UNTUK USER YANG MEMILIKI HAK AKSES ADMIN/MANAJEMEN)
    Route::resource('anggota', AnggotaController::class)->names([
        'index' => 'anggota.index',
        'create' => 'anggota.create',
        'store' => 'anggota.store',
        'show' => 'anggota.show',
        'edit' => 'anggota.edit',
        'update' => 'anggota.update',
        'destroy' => 'anggota.destroy',
    ])->parameters([
        'anggota' => 'anggota' 
    ]);
});

require __DIR__.'/auth.php';