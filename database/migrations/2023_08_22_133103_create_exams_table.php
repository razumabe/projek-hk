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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('santri_id');
            $table->unsignedBigInteger('mapel_id');
            $table->integer('tahun_ajaran');
            $table->decimal('total_score', 8, 2)->nullable();
            $table->decimal('average_score', 8, 2)->nullable();
            $table->integer('ranking')->nullable();
            $table->integer('nilai_uts');
            $table->integer('nilai_uas');
            $table->timestamps();

            $table->foreign('santri_id')->references('id')->on('santris');
            $table->foreign('mapel_id')->references('id')->on('mapels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
