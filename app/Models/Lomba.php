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
        'persyaratan',
        'juknis',
        'biaya',
    ];

    public function daftars()
    {
        return $this->hasOne(Daftar::class, 'id_lomba');
    }
}
