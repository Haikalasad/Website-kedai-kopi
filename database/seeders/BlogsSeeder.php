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
                'image_url' => 'https://th.bing.com/th/id/OIP.oAlOV3rI5umd1ewaDhJWHQHaE8?w=264&h=180&c=7&r=0&o=5&pid=1.7',
                'description' => 'Pelajari rahasia membuat espresso yang sempurna, mulai dari pemilihan biji kopi hingga menguasai mesin espresso.',
            ],
            [
                'title' => '5 Tren Kopi Teratas yang Wajib Dicoba Tahun Ini',
                'image_url' => 'https://tekun.co.id/wp-content/uploads/2023/06/16296337.jpg',
                'description' => 'Tetap up-to-date dengan tren kopi terbaru, seperti cold brew, nitro coffee, dan praktik pengadaan kopi yang berkelanjutan.',
            ],
            [
                'title' => 'Panduan Memadukan Kopi dengan Makanan Manis',
                'image_url' => 'https://th.bing.com/th/id/OIP.2zt3qKsWeO9UiT1y2C2gRAHaEq?rs=1&pid=ImgDetMain',
                'description' => 'Temukan cara untuk memadukan berbagai jenis kopi dengan makanan penutup agar cita rasa semakin kaya.',
            ],
            [
                'title' => 'Manfaat Kesehatan Minum Kopi Setiap Hari',
                'image_url' => 'https://www.glam.com/img/gallery/the-zodiac-signs-that-are-most-likely-to-be-quiet-and-soft-spoken/taurus-1682610035.jpg',
                'description' => 'Jelajahi berbagai manfaat kesehatan dari kopi, mulai dari meningkatkan kewaspadaan hingga antioksidan yang bermanfaat.',
            ],
            [
                'title' => 'Perjalanan Kami: Menyusuri Biji Kopi dari Seluruh Dunia',
                'image_url' => 'https://media.istockphoto.com/id/1020010850/id/foto/peta-dunia-yang-terbuat-dari-biji-kopi-panggang-dengan-latar-belakang-kertas-coklat-industri.jpg?s=170667a&w=0&k=20&c=ko4TMnEU2lHlkXP0a8SnV18lsdC6Lr63Z1wvt_G0CpY=',
                'description' => 'Baca tentang komitmen kami dalam mencari biji kopi terbaik dari perkebunan berkelanjutan di berbagai belahan dunia.',
            ],
            [
                'title' => 'Tips Menyeduh Kopi di Rumah Seperti Barista',
                'image_url' => 'https://asset.kompas.com/crops/nvmSG7PsVEsDiAA45oVRlg40Ztc=/0x0:1000x667/750x500/data/photo/2020/02/20/5e4e3c72dcac4.jpg',
                'description' => 'Tips dan trik untuk menyeduh kopi berkualitas ala barista di rumah, mulai dari French press hingga pour-over.',
            ],
            [
                'title' => 'Memahami Berbagai Jenis Sangrai Kopi',
                'image_url' => 'https://media.istockphoto.com/id/1392349652/id/foto/latar-belakang-biji-kopi-konsep-kopi-sangrai-dengan-berbagai-jenis-biji-dan-batang-kayu-manis.jpg?s=170667a&w=0&k=20&c=4_4t_xdQqR5-dWNj9--mDoUWJ3ur7k4PCz4l9LzBHFo=',
                'description' => 'Dari sangrai ringan hingga gelap, pelajari bagaimana setiap proses sangrai mempengaruhi rasa kopi Anda.',
            ],
            [
                'title' => 'Program Pelatihan Barista Kami',
                'image_url' => 'https://th.bing.com/th/id/OIP.j8Iv_eWCf0Y4UDvJmgj9jQHaE8?rs=1&pid=ImgDetMain',
                'description' => 'Kenali para barista berbakat kami dan temukan bagaimana mereka menyempurnakan keahlian untuk menghadirkan kopi terbaik.',
            ],
            [
                'title' => 'Asal Usul Kopi: Sebuah Sejarah Singkat',
                'image_url' => 'https://rakyatbengkulu.disway.id/upload/d1aa5d3da08fc2ff4c02fbf2911e8ae9.jpg',
                'description' => 'Mengintip sejarah kopi yang menarik, dari penemuan di Ethiopia hingga menjadi minuman populer di seluruh dunia.',
            ],
            [
                'title' => 'Cold Brew vs. Iced Coffee: Apa Bedanya?',
                'image_url' => 'https://th.bing.com/th/id/OIP.nKZWcmcvQ1BdpVhepR6DewHaHZ?rs=1&pid=ImgDetMain',
                'description' => 'Ulasan tentang perbedaan cold brew dan iced coffee, serta bagaimana setiap metode memberikan cita rasa unik pada kopi Anda.',
            ],
        ]);
        

    }
}
