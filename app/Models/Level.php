<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    // nama tabel
    protected $table = 'tb_role';
    // primary key
    protected $primaryKey = 'id_role';
    // field yang bisa di isi
    protected $fillable = ['role'];

    // RELASI ke >> tabel/model petugas
    public function petugas(){
        return $this->hasMany(Petugas::class, 'id_role', 'id_role');
    }
}
