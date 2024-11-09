<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CartItem;
use App\Models\Cart;
use App\Models\Coffee;

class CartItemsTableSeeder extends Seeder
{
    public function run()
    {
        $carts = Cart::all();
        $products = Coffee::all();

        foreach ($carts as $cart) {
            foreach ($products->random(2) as $product) { // Mengambil 2 produk acak
                CartItem::create([
                    'cart_id' => $cart->id,
                    'coffee_id' => $product->id,
                    'quantity' => rand(1, 5), // Jumlah acak antara 1-5
                ]);
            }
        }
    }
}