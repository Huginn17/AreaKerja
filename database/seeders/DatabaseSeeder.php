<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\CatatanCash;
use App\Models\DaftarBank;
use App\Models\Finance;
use App\Models\Hargakoin;
use App\Models\HargaPembayaran;
use App\Models\SuperAdmin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            "username"           =>    "megawati",
            "email"              =>    "mega@gmail.com",
            "password"           =>     Hash::make('123'),
            "role"               =>     "super_admin",
            "verified"           =>     1,
            "alasan_freeze_akun" =>     null
        ]);

        SuperAdmin::create([
            "user_id"            =>     1,
            "nama_lengkap"       =>     "Megawati",
            "provinsi"           =>     "DKI Jakarta"
        ]);


        User::create([
            "username"           =>    "prabowo",
            "email"              =>    "owo@gmail.com",
            "password"           =>     Hash::make('123'),
            "role"               =>     "admin",
            "verified"           =>     1,
            "alasan_freeze_akun" =>     null
        ]);

        Admin::create([
            "user_id"            =>     2,
            "nama_lengkap"       =>    "Prabowo Subianto",
            "provinsi"           =>    "Jawa Barat"
        ]);

        User::create([
            "username"           =>    "jokowi",
            "email"              =>    "jokowi@gmail.com",
            "password"           =>     Hash::make('123'),
            "role"               =>     "finance",
            "verified"           =>     1,
            "alasan_freeze_akun" =>     null
        ]);

        Finance::create([
            "user_id"            =>   3,
            "nama_lengkap"       =>  'Joko Widodo',
            "provinsi"           =>  'Jawa Barat'
        ]);

        Hargakoin::create([
            "nama"     =>      "Pasang Lowongan Bronze",
            "harga"    =>      150
        ]);

        Hargakoin::create([
            "nama"     =>      "Pasang Lowongan Silver",
            "harga"    =>      150
        ]);
        Hargakoin::create([
            "nama"     =>      "Pasang Lowongan Gold",
            "harga"    =>      150
        ]);
        Hargakoin::create([
            "nama"     =>      "Open Talent Hunter",
            "harga"    =>      150
        ]);
        Hargakoin::create([
            "nama"     =>      "Open CV",
            "harga"    =>      150
        ]);
        Hargakoin::create([
            "nama"     =>      "Berlangganan",
            "harga"    =>      150
        ]);

        HargaPembayaran::create([
            "nama"     =>    "Pendaftaran Kandidat",
            "harga"       => 200000
        ]);

        HargaPembayaran::create([
            "nama"     =>    "Top Up 10 Koin Area Kerja",
            "jumlah_koin" =>  10,
            "harga"       => 10000,
            "icon"        => "bitcoin.png"
        ]);
        HargaPembayaran::create([
            "nama"     =>    "Top Up 100 Koin Area Kerja",
            "jumlah_koin" =>  100,
            "harga"       => 100000,
            "icon"        => "bit2.png"

        ]);
        HargaPembayaran::create([
            "nama"     =>    "Top Up 1000 Koin Area Kerja",
            "jumlah_koin" =>  1000,
            "harga"       => 500000,
            "icon"        => "bit3.png"
        ]);
        HargaPembayaran::create([
            "nama"     =>    "Top Up 10000 Koin Area Kerja",
            "jumlah_koin" =>  10000,
            "harga"       => 1000000,
            "icon"        => "bit4.png"

        ]);
        HargaPembayaran::create([
            "nama"     =>    "Top Up 100000 Koin Area Kerja",
            "jumlah_koin" =>  100000,
            "harga"       => 1500000,
            "icon"        => "bit5.png"
        ]);
        HargaPembayaran::create([
            "nama"     =>    "Top Up 1000000 Koin Area Kerja",
            "jumlah_koin" =>  1000000,
            "harga"       => 2000000,
            "icon"        => "bit6.png"
        ]);
        DaftarBank::create([
            "nama_bank"  =>    "Bank BCA",
            "owner"      =>     "Areakerja",
            "no_rek"     =>     "009912212",
            "logo_image"   =>     "bitcoin.png"
        ]);
        DaftarBank::create([
            "nama_bank"  =>    "Bank BNI",
            "owner"      =>     "Areakerja",
            "no_rek"     =>     "099123212",
            "logo_image"   =>     "topup_icon/Bca.png"
        ]);
        DaftarBank::create([
            "nama_bank"  =>    " Bank BRI",
            "owner"      =>     "Areakerja",
            "no_rek"     =>     "0021222112",
            "logo_image"   =>     "topup_icon/Bri.png"
        ]);
        DaftarBank::create([
            "nama_bank"  =>    "Qris",
            "owner"      =>     "Areakerja",
            "no_rek"     =>     "0021092829",
            "logo_image"   =>     "topup_icon/Bri.png"
        ]);
    }
}
