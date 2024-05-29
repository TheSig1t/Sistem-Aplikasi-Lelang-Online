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
        Schema::table('tb_lelang', function (Blueprint $table) {
            // Membuat kolom baru pada tabel lelang
            $table->unsignedBigInteger('id_barang')->after('status');
            $table->unsignedBigInteger('id_petugas')->after('id_barang');
            $table->unsignedBigInteger('id_user')->after('id_petugas');
            
            // menentukan setiap kolom relasi dengan tabel yang ingin di relasi
            $table->foreign('id_barang')->references('id_barang')->on('tb_barang')->onDelete('cascade');
            $table->foreign('id_petugas')->references('id_petugas')->on('tb_petugas');
            $table->foreign('id_user')->references('id_user')->on('tb_masyarakat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_lelang', function (Blueprint $table) {
            //
        });
    }
};
