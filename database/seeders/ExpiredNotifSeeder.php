<?php

namespace Database\Seeders;

use App\Models\Notifikasi;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpiredNotifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Notifikasi::create([
            'user_id' => 4, // ganti dengan id user yang ada
            'pelamar_lowongan_id' => 1, // ganti juga dengan id lamaran yang ada
            'judul' => 'Lamaran Expired',
            'pesan' => 'Contoh notifikasi expired untuk testing',
            'is_read' => 0,
            'created_at' => Carbon::now()->subDays(5), // mundurkan 5 hari
        ]);
    }


}
