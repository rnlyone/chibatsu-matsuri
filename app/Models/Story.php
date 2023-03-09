<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'type',
        'lenght',
        'src',
        'preview',
        'link',
        'seen',
        'time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
