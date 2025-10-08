<?php

namespace App\Providers;

use App\Models\Notifikasi;
use App\Models\PelamarLowongan;
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
            if (Auth::check() && Auth::user()->role === 'pelamar') {
                $notifikasis = Notifikasi::where('user_id', Auth::id())
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();

                $jumlahBelumDibaca = Notifikasi::where('user_id', Auth::id())
                    ->where('is_read', false)
                    ->count();
            } else {
                // default kosong
                $notifikasis = collect();
                $jumlahBelumDibaca = 0;
            }

            $view->with([
                'global_notifikasis' => $notifikasis,
                'global_notifikasi_unread' => $jumlahBelumDibaca,
            ]);
        });

        View::composer('*', function ($view) {
            if (Auth::check() && Auth::user()->role === 'perusahaan') {
                $notifikasis = Notifikasi::where('user_id', Auth::id())
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();

                $jumlahBelumDibaca = Notifikasi::where('user_id', Auth::id())
                    ->where('is_read', false)
                    ->count();
            } else {
                // default kosong kalau bukan perusahaan
                $notifikasis = collect();
                $jumlahBelumDibaca = 0;
            }

            $view->with([
                'global_notifikasis' => $notifikasis,
                'global_notifikasi_unread' => $jumlahBelumDibaca,
            ]);
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
