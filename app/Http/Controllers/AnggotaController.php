<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class AnggotaController extends Controller
{
    /**
     * Tampilkan daftar anggota.
     */
    public function index()
    {
        $anggotas = Anggota::orderBy('angkatan', 'desc')->get();
        return view('anggota.index', compact('anggotas'));
    }

    /**
     * Tampilkan formulir untuk membuat anggota baru.
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Simpan anggota baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|unique:anggotas|max:20',
            'jurusan' => 'required|string|max:100',
            'angkatan' => 'required|integer|digits:4',
            'jabatan' => 'nullable|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('anggotas', 'public');
            $validatedData['foto'] = basename($path);
        }

        Anggota::create($validatedData);

        return Redirect::route('anggota.index')->with('status', 'Anggota berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail anggota.
     */
    public function show(Anggota $anggota)
    {
        return view('anggota.show', compact('anggota'));
    }

    /**
     * Tampilkan formulir untuk mengedit anggota.
     */
    public function edit(Anggota $anggota)
    {
        return view('anggota.edit', compact('anggota'));
    }

    /**
     * Perbarui anggota yang ada di database.
     */
    public function update(Request $request, Anggota $anggota)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:anggotas,nim,' . $anggota->id, // Abaikan NIM saat ini
            'jurusan' => 'required|string|max:100',
            'angkatan' => 'required|integer|digits:4',
            'jabatan' => 'nullable|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($anggota->foto) {
                Storage::disk('public')->delete('anggotas/' . $anggota->foto);
            }
            $path = $request->file('foto')->store('anggotas', 'public');
            $validatedData['foto'] = basename($path);
        } else {
            $validatedData['foto'] = $anggota->foto;
        }

        $anggota->update($validatedData);

        return Redirect::route('anggota.index')->with('status', 'Data anggota berhasil diperbarui!');
    }

    /**
     * Hapus anggota dari database.
     */
    public function destroy(Anggota $anggota)
    {
        if ($anggota->foto) {
            Storage::disk('public')->delete('anggotas/' . $anggota->foto);
        }

        $anggota->delete();

        return Redirect::route('anggota.index')->with('status', 'Anggota berhasil dihapus!');
    }
}