<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('blogs')->insert([
            [
                'title' => 'Seni Membuat Espresso Sempurna',
                'image_url' => 'https://th.bing.com/th/id/OIP.tszYH5-LFIxG-3E_JAhVWQHaE8?pid=ImgDet&rs=1',
                'description' => 'Pelajari rahasia membuat espresso yang sempurna, mulai dari pemilihan biji kopi hingga menguasai mesin espresso.',
            ],
            [
                'title' => '5 Tren Kopi Teratas yang Wajib Dicoba Tahun Ini',
                'image_url' => 'https://th.bing.com/th/id/OIP.sRKHT4A4GpGxAJgHrPt8ZAHaE8?pid=ImgDet&rs=1',
                'description' => 'Tetap up-to-date dengan tren kopi terbaru, seperti cold brew, nitro coffee, dan praktik pengadaan kopi yang berkelanjutan.',
            ],
            [
                'title' => 'Panduan Memadukan Kopi dengan Makanan Manis',
                'image_url' => 'https://th.bing.com/th/id/OIP.L_kug8I7gj32JSft9JfAwAHaE8?pid=ImgDet&rs=1',
                'description' => 'Temukan cara untuk memadukan berbagai jenis kopi dengan makanan penutup agar cita rasa semakin kaya.',
            ],
            [
                'title' => 'Manfaat Kesehatan Minum Kopi Setiap Hari',
                'image_url' => 'https://th.bing.com/th/id/OIP.NPmCJqzFWPCOXfx7Lxs4MgHaE8?pid=ImgDet&rs=1',
                'description' => 'Jelajahi berbagai manfaat kesehatan dari kopi, mulai dari meningkatkan kewaspadaan hingga antioksidan yang bermanfaat.',
            ],
            [
                'title' => 'Perjalanan Kami: Menyusuri Biji Kopi dari Seluruh Dunia',
                'image_url' => 'https://th.bing.com/th/id/OIP.LomwfbjVg6L0-8QZ-UxiNAHaJm?pid=ImgDet&rs=1',
                'description' => 'Baca tentang komitmen kami dalam mencari biji kopi terbaik dari perkebunan berkelanjutan di berbagai belahan dunia.',
            ],
            [
                'title' => 'Tips Menyeduh Kopi di Rumah Seperti Barista',
                'image_url' => 'https://th.bing.com/th/id/OIP.G0X_vExRmsjUir7wGC8B4wHaHa?pid=ImgDet&rs=1',
                'description' => 'Tips dan trik untuk menyeduh kopi berkualitas ala barista di rumah, mulai dari French press hingga pour-over.',
            ],
            [
                'title' => 'Memahami Berbagai Jenis Sangrai Kopi',
                'image_url' => 'https://th.bing.com/th/id/OIP.7B2yzRHMeXrs-5zP8DPKFQHaHa?pid=ImgDet&rs=1',
                'description' => 'Dari sangrai ringan hingga gelap, pelajari bagaimana setiap proses sangrai mempengaruhi rasa kopi Anda.',
            ],
            [
                'title' => 'Program Pelatihan Barista Kami',
                'image_url' => 'https://th.bing.com/th/id/OIP.V8BprR5A2uObNTuHD5ByagHaJQ?pid=ImgDet&rs=1',
                'description' => 'Kenali para barista berbakat kami dan temukan bagaimana mereka menyempurnakan keahlian untuk menghadirkan kopi terbaik.',
            ],
            [
                'title' => 'Asal Usul Kopi: Sebuah Sejarah Singkat',
                'image_url' => 'https://th.bing.com/th/id/OIP.R3BO12A1eGl6VLuyz7v6bAHaHa?pid=ImgDet&rs=1',
                'description' => 'Mengintip sejarah kopi yang menarik, dari penemuan di Ethiopia hingga menjadi minuman populer di seluruh dunia.',
            ],
            [
                'title' => 'Cold Brew vs. Iced Coffee: Apa Bedanya?',
                'image_url' => 'https://th.bing.com/th/id/OIP.kG6J_fGB4z4C3vQwQ9uJVAHaE7?pid=ImgDet&rs=1',
                'description' => 'Ulasan tentang perbedaan cold brew dan iced coffee, serta bagaimana setiap metode memberikan cita rasa unik pada kopi Anda.',
            ],
        ]);
        

    }
}
