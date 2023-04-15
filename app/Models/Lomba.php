<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lomba',
        'kuota',
        'deskripsi',
        'sinopsis',
        'persyaratan',
        'juknis',
        'biaya',
        'level',
        'terbuka_untuk',
        'visibilitas',
        'src',
        'catatan',
        'gruplink'
    ];

    public function daftars()
    {
        return $this->hasMany(Daftar::class, 'id_lomba');
    }
}
