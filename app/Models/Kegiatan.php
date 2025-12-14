<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nama',
        'deskripsi',
        'tanggal',
        'tempat',
        'gambar',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'tanggal' => 'date', // Penting untuk memformat tanggal secara otomatis
    ];
}