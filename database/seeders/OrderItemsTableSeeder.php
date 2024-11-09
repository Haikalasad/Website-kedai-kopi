<?php

namespace Database\Seeders;

use App\Models\Coffee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderItem;
use App\Models\Order;


class OrderItemsTableSeeder extends Seeder
{
    public function run()
    {
        $orders = Order::all();
        $products = Coffee::all();

        foreach ($orders as $order) {
            foreach ($products->random(2) as $product) { 
                OrderItem::create([
                    'order_id' => $order->id,
                    'coffee_id' => $product->id,
                    'quantity' => rand(1, 5), 
                    'price' => $product->price,
                ]);
            }
        }
    }
}