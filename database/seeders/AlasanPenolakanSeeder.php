<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AlasanPenolakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $alasan = [
            'Gaji yang ditawarkan tidak sesuai',
            'Menerima tawaran dari perusahaan lain',
            'Menginginkan benefit yang lebih lengkap',
            'Menginginkan fleksibilitas dalam bekerja',
        ];

        // Simpan ke file config/alasan_penolakan.php
        $content = "<?php\n\nreturn " . var_export($alasan, true) . ";\n";
        File::put(config_path('alasan_penolakan.php'), $content);

        $this->command->info("Daftar alasan penolakan berhasil dibuat di config/alasan_penolakan.php");
    }
    }
