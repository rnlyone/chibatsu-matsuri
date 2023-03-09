<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_lomba',
        'id_user',
        'status_bayar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function lomba()
    {
        return $this->belongsTo(Lomba::class, 'id_lomba');
    }

    public function tim()
    {
        return $this->belongsTo(Tim::class, 'id_tim');
    }
}
