<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KegiatanController; 
use App\Http\Controllers\AnggotaController; //

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // RESOURCE ROUTE UNTUK KEGIATAN
    Route::resource('kegiatan', KegiatanController::class)->names([
        'index' => 'kegiatan.index',
        'create' => 'kegiatan.create',
        'store' => 'kegiatan.store',
        'edit' => 'kegiatan.edit',
        'update' => 'kegiatan.update',
        'destroy' => 'kegiatan.destroy',
        'show' => 'kegiatan.show', // Pastikan 'show' ada untuk Kegiatan
    ]);
    
    // RESOURCE ROUTE UNTUK ANGGOTA (Ditambahkan 'parameters' untuk mengatasi masalah 'anggotum')
    Route::resource('anggota', AnggotaController::class)->names([
        'index' => 'anggota.index',
        'create' => 'anggota.create',
        'store' => 'anggota.store',
        'show' => 'anggota.show',
        'edit' => 'anggota.edit',
        'update' => 'anggota.update',
        'destroy' => 'anggota.destroy',
    ])->parameters([
        'anggota' => 'anggota' // Mengganti parameter {anggotum} menjadi {anggota}
    ]);
});

require __DIR__.'/auth.php';