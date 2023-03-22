<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tiket',
        'deskripsi_tiket',
        'harga',
        'harga_coret',
        'kuota',
    ];

    public function orderdetails()
    {
        return $this->hasMany(OrderDetail::class, 'id_tiket');
    }

    public function orders()
    {
        return $this->hasManyThrough(Order::class, OrderDetail::class, 'id_tiket', 'id', 'id', 'id_order');
    }
}
