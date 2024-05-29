<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;
    // nama tabel
    protected $table = 'tb_petugas';
    // primary key
    protected $primaryKey = 'id_petugas';
    // field yang bisa di isi
    protected $fillable = ['nama_petugas', 'username', 'password', 'id_role'];

    // RELASI ke >> tabel role
    // belongsTo relasi one to many mempunyai arti dimana setiap petugas hanya mempunyai satu data dari tabel role atau hanya mempunyai satu role saja
    public function role()
    {
        return $this->belongsTo(Level::class, 'id_role', 'id_role');
    }

    // RELASi ke >> tabel lelang
    // meskipun tidak ada id_lelang ini buat jaga - jaga aja 
    // hasMany adalah relasi one to many dimana 1 field dapata mempunyai banyak data
    public function lelang(){
        return $this->hasMany(lelang::class, 'id_petugas', 'id_petugas');
    }
}
