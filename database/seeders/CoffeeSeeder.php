<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoffeeSeeder extends Seeder
{
    public function run()
    {
        DB::table('coffees')->insert([
            [
                'name' => 'Ice Americano',
                'price' => 30000,
                'image_url' => 'https://th.bing.com/th/id/OIP.Qdjl2UnflKurS06cphm_JAHaHa?w=1024&h=1024&rs=1&pid=ImgDetMain',
                'description' => 'Ini adalah Ice Americano',
            ],
            [
                'name' => 'Vanilla Latte',
                'price' => 25000,
                'image_url' => 'https://th.bing.com/th/id/OIP.FET9R-tNJB3qPVjAcpyIDwHaLH?w=1200&h=1800&rs=1&pid=ImgDetMain',
                'description' => 'Ini adalah Ice Vanilla Latte',
            ],
            [
                'name' => 'Cappuccino',
                'price' => 30000,
                'image_url' => 'https://th.bing.com/th/id/OIP.M0QuWKdFA8fO9PxDek68jgHaHa?w=1200&h=1200&rs=1&pid=ImgDetMain',
                'description' => 'Ini adalah Cappuccino',
            ],
        ]);
    }
}
