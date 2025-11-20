<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Teknologi',
            'Pelayanan',
            'Administrasi',
            'Pemasaran',
            'Pendidik',
            'Customer Service',
            'Keuangan',
            'Kasir',
            'Admin',
            'Programmer',
            'Marketing',
            'Multimedia'
        ];

        foreach ($categories as $c) {
            Category::create(['nama' => $c]);
        }
    }
}
