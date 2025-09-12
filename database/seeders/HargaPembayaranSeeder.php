<?php

namespace Database\Seeders;

use App\Models\HargaPembayaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HargaPembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HargaPembayaran::insert([
            ['nama' => 'Paket Kecil', 'jumlah_koin' => 50, 'harga' => 10000, 'icon' => 'coin1.png'],
            ['nama' => 'Paket Sedang', 'jumlah_koin' => 120, 'harga' => 20000, 'icon' => 'coin2.png'],
            ['nama' => 'Paket Besar', 'jumlah_koin' => 300, 'harga' => 50000, 'icon' => 'coin3.png'],
        ]);
    }
}
