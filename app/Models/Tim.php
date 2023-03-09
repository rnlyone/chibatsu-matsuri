<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tim',
        'instansi',
    ];

    public function daftars()
    {
        return $this->hasMany(Daftar::class, 'id_tim');
    }
}
