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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->string('nama'); // Nama Kegiatan
            $table->text('deskripsi'); // Deskripsi Kegiatan
            $table->date('tanggal'); // Tanggal Pelaksanaan
            $table->string('tempat'); // Tempat Pelaksanaan
            $table->string('gambar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatanss');
    }
};
