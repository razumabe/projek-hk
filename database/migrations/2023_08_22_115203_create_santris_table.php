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
            $table->string('nis')->unique(); // Tambahkan kolom NIS dengan atribut unique
            $table->string('nama');
            $table->string('kelas');
            $table->integer('tahun_ajaran');
            $table->enum('status', ['Aktif', 'Lulus', 'Drop Out', 'Mengundurkan Diri']);
            $table->timestamps();
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
