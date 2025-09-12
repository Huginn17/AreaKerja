<?php

namespace Database\Seeders;

use App\Models\DaftarBank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaftarBankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DaftarBank::insert([
            ['nama_bank' => 'BCA', 'owner' => 'PT ABC', 'no_rek' => '1234567890', 'logo_image' => 'bca.png'],
            ['nama_bank' => 'BNI', 'owner' => 'PT ABC', 'no_rek' => '0987654321', 'logo_image' => 'bni.png'],
            ['nama_bank' => 'Mandiri', 'owner' => 'PT ABC', 'no_rek' => '5678901234', 'logo_image' => 'mandiri.png'],
        ]);
    }
}
