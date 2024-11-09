<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function coffee() // Ubah nama method menjadi 'coffee' sesuai kolom 'coffee_id'
    {
        return $this->belongsTo(Coffee::class, 'coffee_id');
    }
}