<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;
    // nama tabel
    protected $table = 'tb_barang';
    // primary key
    protected $primaryKey = 'id_barang';
    // field yang bisa di isi
    protected $fillable = ['nama_barang', 'tgl', 'harga_awal', 'deskripsi_barang', 'foto_barang'];

    // RELASI ke >> tabel lelang
    // hasOne adalah relasi one to one yang dimana 1 field hanya bisa mempunyai 1 data lagi
    public function lelang(){
        return $this->hasMany(Lelang::class, 'id_lelang', 'id_lelang')->onDelete('cascade');
    }
}
