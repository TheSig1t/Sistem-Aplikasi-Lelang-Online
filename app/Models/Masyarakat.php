<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    use HasFactory;
    // nama tabel
    protected $table = 'tb_masyarakat';
    // primary key
    protected $primaryKey = 'id_user';
    // field yang bisa di isi
    protected $fillable = ['nama_lengkap', 'username', 'pass', 'telp'];

    // Relasi ke >> tabel lelang
    // meskipun tidak ada id_lelang ini buat jaga - jaga aja
    // hasMany adalah relasi one to many yang dimana 1 field bisa mempunyai banyak data
    public function lelang(){
        return $this->hasMany(Lelang::class, 'id_user', 'id_user');
    }
}
