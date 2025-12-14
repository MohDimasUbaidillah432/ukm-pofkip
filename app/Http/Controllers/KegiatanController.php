<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;

class KegiatanController extends Controller
{
    /**
     * Tampilkan daftar kegiatan.
     */
    public function index()
    {
        $kegiatans = Kegiatan::orderBy('tanggal', 'desc')->get();
        return view('kegiatan.index', compact('kegiatans'));
    }

    /**
     * Tampilkan formulir untuk membuat kegiatan baru.
     */
    public function create()
    {
        return view('kegiatan.create');
    }

    /**
     * Simpan kegiatan baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi Data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'tempat' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Opsional
        ]);

        // 2. Upload Gambar (Jika ada)
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('kegiatans', 'public');
            $validatedData['gambar'] = basename($path);
        }

        // 3. Simpan ke Database
        Kegiatan::create($validatedData);

        return Redirect::route('kegiatan.index')->with('status', 'Kegiatan berhasil ditambahkan!');
    }

    /**
     * Tampilkan formulir untuk mengedit kegiatan.
     */
    public function edit(Kegiatan $kegiatan)
    {
        return view('kegiatan.edit', compact('kegiatan'));
    }

    /**
     * Perbarui kegiatan yang ada di database.
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        // 1. Validasi Data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'tempat' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Opsional
        ]);

        // 2. Upload Gambar Baru (Jika ada)
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($kegiatan->gambar) {
                Storage::disk('public')->delete('kegiatans/' . $kegiatan->gambar);
            }
            // Simpan gambar baru
            $path = $request->file('gambar')->store('kegiatans', 'public');
            $validatedData['gambar'] = basename($path);
        } else {
            // Pertahankan gambar lama jika tidak ada upload baru
            $validatedData['gambar'] = $kegiatan->gambar;
        }

        // 3. Perbarui Database
        $kegiatan->update($validatedData);

        return Redirect::route('kegiatan.index')->with('status', 'Kegiatan berhasil diperbarui!');
    }

    /**
     * Hapus kegiatan dari database.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        // Hapus file gambar dari storage
        if ($kegiatan->gambar) {
            Storage::disk('public')->delete('kegiatans/' . $kegiatan->gambar);
        }

        // Hapus data dari database
        $kegiatan->delete();

        return Redirect::route('kegiatan.index')->with('status', 'Kegiatan berhasil dihapus!');
    }
}