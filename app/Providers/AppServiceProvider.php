<?php

namespace App\Providers;

use App\Models\DaftarBank;
use App\Models\HargaPembayaran;
use App\Models\Notifikasi;
use App\Models\PelamarLowongan;
use App\Models\Provinsi;
use App\Models\SocialLink;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // // Bagikan $notifs ke semua view yang extend layouts.index
        // Share notifikasi ke semua view pelamar
        View::composer('*', function ($view) {
            if (!Auth::check()) {
                // kalau belum login, kosongkan
                $notifikasis = collect();
                $jumlahBelumDibaca = 0;
            } else {
                $user = Auth::user();

                // ambil notifikasi berdasarkan user_id (sama untuk pelamar & perusahaan)
                $notifikasis = Notifikasi::where('user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();

                $jumlahBelumDibaca = Notifikasi::where('user_id', $user->id)
                    ->where('is_read', false)
                    ->count();
            }

            // kirim ke semua view
            $view->with([
                'global_notifikasis' => $notifikasis,
                'global_notifikasi_unread' => $jumlahBelumDibaca,
            ]);
        });

        View::composer('layouts.footer', function ($view) {
            $view->with('socialLinks', SocialLink::all());
        });


        //top up
        View::composer('*', function ($view) {
            // Cek apakah user login dan role perusahaan
            if (Auth::check() && Auth::user()->role === 'perusahaan') {

                // Data khusus perusahaan
                $hargaPembayarans = HargaPembayaran::where('jumlah_koin', '>', 0)->get();
                $daftarBank = DaftarBank::all();

                // Share ke semua view
                $view->with([
                    'hargaPembayarans' => $hargaPembayarans,
                    'daftarBank' => $daftarBank,
                ]);
            }
        });

        // Share provinsis ke semua view admin/sidebar
        View::composer('admin.sidebar.index', function ($view) {
            $view->with('provinsis', Provinsi::orderBy('nama')->get());
        });

        // View::composer('layouts.index', function ($view) {
        //     $unreadCount = 0;

        //     if (Auth::check() && Auth::user()->pelamar) {
        //         $pelamarId = Auth::user()->pelamar->id;

        //         $unreadCount = PelamarLowongan::where('pelamar_id', $pelamarId)
        //             ->whereNotNull('status')
        //             ->where('is_read', 0)
        //             ->count();
        //     }

        //     $view->with('unreadCount', $unreadCount);
        // });
    }
}
