<?php

namespace Database\Seeders;

use App\Models\SuperAdmin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 🔹 Matikan foreign key check dulu supaya bisa truncate
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        SuperAdmin::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 🔹 Data user
        $userdata = [
            [
                'username' => 'gilang',
                'email' => 'gilang1@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'super_admin',
                'verified' => 1,
            ],
            [
                'username' => 'holis',
                'email' => 'holis@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'finance'
            ],
            [
                'username' => 'adrian',
                'email' => 'adrian@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'admin'
            ],
            [
                'username' => 'memet',
                'email' => 'perusahaan@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'perusahaan'
            ],
            [
                'username' => 'NPC',
                'email' => 'npc@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'pelamar'
            ]
        ];

        foreach ($userdata as $val) {
            User::create($val);
        }

        // 🔹 Buat superadmin terkait user_id 1
        SuperAdmin::create([
            'user_id' => 1,
            'nama_lengkap' => 'gilang',
        ]);
    }
}
