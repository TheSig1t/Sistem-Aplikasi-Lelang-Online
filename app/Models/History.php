<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    // nama tabel
    protected $table = 'tb_history';
    // primary key
    protected $primaryKey = 'id_history';
    // field yang bisa di isi
    protected $fillable = ['id_lelang', 'id_barang', 'id_user', 'penawaran_harga'];

    // RELASI ke >> tabel lelang
    // hasOne adalah relasi one to one yang dimana 1 field hanya bisa mempunyai 1 data lagi
    public function lelang(){
        return $this->belongsTo(Lelang::class,'id_lelang','id_lelang');
    }
    
    // RELASI ke >> tabel barang
    // hasOne adalah relasi one to one yang dimana 1 field hanya bisa mempunyai 1 data lagi
    public function barang(){
    return $this->belongsTo(Barang::class,'id_barang','id_barang');
    }
    
    // RELASI ke >> tabel masyarakat
    // hasMany adalah relasi one to many yang dimana 1 field bisa mempunyai banyak data
    public function masyarakat(){
        return $this->hasMany(Masyarakat::class,'id_user','id_user');
    }
    
}
