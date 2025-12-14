<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim')->unique(); // Nomor Induk Mahasiswa harus unik
            $table->string('jurusan');
            $table->string('angkatan'); // Tahun masuk
            $table->string('jabatan')->nullable(); // Misal: Ketua, Anggota, Bendahara
            $table->string('foto')->nullable(); // Path foto anggota
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};