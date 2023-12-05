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
        Schema::create('santris', function (Blueprint $table) {
            $table->id();
            $table->string('nis')->unique();
            $table->string('email')->unique();
            $table->string('nama');
            $table->string('kelas');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->text('alamat');
            $table->string('nomor_telepon');
            $table->date('tanggal_daftar');
            $table->enum('status', ['Aktif', 'Tidak Aktif']);
            $table->string('foto')->nullable(); // Kolom untuk menyimpan path gambar foto
            $table->timestamps(); // Kolom ini akan otomatis menyimpan waktu pembuatan dan pembaruan

            $table->index(['nis', 'kelas']); // Indeks untuk pencarian cepat jika diperlukan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santris');
    }
};
