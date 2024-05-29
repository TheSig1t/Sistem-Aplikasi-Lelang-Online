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
        Schema::create('tb_masyarakat', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('nama_lengkap')->nullable();
            $table->string('username')->nullable();
            $table->string('pass')->nullable();
            $table->bigInteger('telp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_masyarakat');
    }
};
