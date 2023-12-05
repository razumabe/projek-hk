<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunaRoleTable extends Migration
{
    public function up()
    {
        Schema::create('pengguna_role', function (Blueprint $table) {
            $table->unsignedBigInteger('pengguna_id');
            $table->unsignedBigInteger('role_id');
            
            $table->foreign('pengguna_id')->references('id')->on('penggunas')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            
            $table->primary(['pengguna_id', 'role_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengguna_role');
    }
};
