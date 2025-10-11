<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // === PROVINSI ===
        $provinsi = json_decode(file_get_contents(database_path('data/provinces.json')), true);

        foreach ($provinsi as $p) {
            DB::table('provinsis')->insert([
                'id' => (int) $p['id'], // gunakan id dari json agar konsisten
                'nama' => ucwords(strtolower($p['name'])),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // === KOTA / KABUPATEN ===
        $kota = json_decode(file_get_contents(database_path('data/regencies.json')), true);

        foreach ($kota as $k) {
            DB::table('kotas')->insert([
                'id' => (int) $k['id'],
                'provinsi_id' => (int) $k['province_id'],
                'nama' => ucwords(strtolower($k['name'])),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // === KECAMATAN ===
        $kecamatan = json_decode(file_get_contents(database_path('data/districts.json')), true);

        foreach ($kecamatan as $kc) {
            DB::table('kecamatans')->insert([
                'id' => (int) $kc['id'],
                'kota_id' => (int) $kc['regency_id'],
                'nama' => ucwords(strtolower($kc['name'])),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
