<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeaderImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            'header_beranda',
            'header_tips_kerja',
            'header_pasang_lowongan',
            'header_daftar_kandidat',
            'header_talent_hunter',
            'header_profil_pelamar',
            'header_lowongan_tersimpan',
            'header_faq',
            'header_rekrut_pelamar',
            'header_pelamar_perusahaan',
            'header_kandidat_ak',
            'header_berlangganan',
            'header_request_data'
        ];

        foreach ($items as $item) {
            SocialLink::firstOrCreate([
                'nama' => $item
            ]);
        }
    }
}
