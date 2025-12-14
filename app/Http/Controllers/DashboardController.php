<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard dengan statistik UKM.
     */
    public function index()
    {
        $totalAnggota = Anggota::count();
        $totalKegiatan = Kegiatan::count();
        $kegiatanTerbaru = Kegiatan::orderBy('tanggal', 'desc')->take(3)->get();

        return view('dashboard', compact('totalAnggota', 'totalKegiatan', 'kegiatanTerbaru'));
    }
}