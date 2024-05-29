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
        Schema::table('tb_history', function (Blueprint $table) {
            // Membuat kolom baru pada tabel lelang
            $table->unsignedBigInteger('id_barang')->after('penawaran_harga');
            $table->unsignedBigInteger('id_lelang')->after('id_barang');
            $table->unsignedBigInteger('id_user')->after('id_lelang');
            
            // menentukan setiap kolom relasi dengan tabel yang ingin di relasi
            $table->foreign('id_barang')->references('id_barang')->on('tb_barang');
            $table->foreign('id_lelang')->references('id_lelang')->on('tb_lelang');
            $table->foreign('id_user')->references('id_user')->on('tb_masyarakat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_history', function (Blueprint $table) {
            //
        });
    }
};
