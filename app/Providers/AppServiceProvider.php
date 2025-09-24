<?php

namespace App\Providers;

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
        // Bagikan $notifs ke semua view yang extend layouts.index
        View::composer('layouts.index', function ($view) {
            if (auth()->check() && auth()->user()->role === 'pelamar') {
                $pelamarId = auth()->user()->pelamar->id;

                $notifs = PelamarLowongan::with(['lowongan_perusahaan.perusahaan', 'jadwal_wawancara'])
                    ->where('pelamar_id', $pelamarId)
                    ->whereIn('status', ['diterima', 'ditolak'])
                    ->where(function($q){
                        $q->whereNull('expired_at')
                        ->orWhere('expired_at', '>', now());
                    })
                    ->orderBy('created_at', 'desc')
                    ->get();

                $view->with('notifs', $notifs);
            } else {
                // Kalau belum login atau bukan pelamar, kirim kosong
                $view->with('notifs', collect());
            }
        });

        View::composer('layouts.index', function ($view) {
            $unreadCount = 0;

            if (Auth::check() && Auth::user()->pelamar) {
                $pelamarId = Auth::user()->pelamar->id;

                $unreadCount = PelamarLowongan::where('pelamar_id', $pelamarId)
                    ->whereNotNull('status')
                    ->where('is_read', 0)   
                    ->count();
            }

            $view->with('unreadCount', $unreadCount);
        });
    }
}
