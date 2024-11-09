<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            Order::create([
                'user_id' => $user->id,
                'total_amount' => rand(50, 300), // Total acak antara 50-300
                'status' => 'pending', // Status awal
            ]);
        }
    }
}