<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    use HasFactory;
    // nama tabel
    protected $table = 'tb_lelang';
    // primary key
    protected $primaryKey = 'id_lelang';
    // field yang bisa di isi
    protected $fillable = ['id_barang', 'id_user', 'id_petugas', 'tgl_lelang', 'harga_akhir', 'status'];

    // RELASI ke >> tabel barang
    // hasOne adalah relasi one to one yang dimana 1 field hanya bisa mempunyai 1 data lagi
    public function barang(){
        return $this->belongsTo(Barang::class,'id_barang','id_barang');
    }
    // RELASI ke >> tabel masyarakat
    // hasOne adalah relasi one to one yang dimana 1 field hanya bisa mempunyai 1 data lagi
    public function masyarakat(){
        return $this->belongsTo(Masyarakat::class,'id_user','id_user');
    }
    
    // RELASI ke >> tabel masyarakat
    // hasOne adalah relasi one to one yang dimana 1 field hanya bisa mempunyai 1 data lagi
    public function petugas(){
        return $this->belongsTo(Petugas::class,'id_petugas','id_petugas');
    }
    
}
