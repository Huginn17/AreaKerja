<?php

use App\Http\Controllers\Schedules\CleanInactiveLowonganController;
use App\Http\Controllers\Schedules\DeleteExpiredLamaranNotifController;
use App\Http\Controllers\Schedules\DeleteExpiredNotificationController;
use App\Http\Controllers\Schedules\DeleteExpiredPelamarController;
use App\Http\Controllers\Schedules\ExpireCashController;
use App\Http\Controllers\Schedules\ExpireLamaranController;
use App\Http\Controllers\Schedules\ExpireLanggananController;
use App\Http\Controllers\Schedules\NotifyExpiredLowonganController;
use App\Http\Controllers\Schedules\ResetExpiredLowonganController;
use Illuminate\Support\Facades\Route;

Route::prefix('cron')
    ->middleware('cron.auth')
    ->group(function () {

        // 1. Hapus lowongan tidak aktif 6 bulan
        Route::controller(CleanInactiveLowonganController::class)->group(function () {
            Route::get('/lowongan/clean-inactive', 'index');
        });

        // 2. Kirim notifikasi lowongan expired
        Route::controller(NotifyExpiredLowonganController::class)->group(function () {
            Route::get('/lowongan/notify-expired', 'index');
        });

        // 3. Expiret transaksi cash
        Route::controller(ExpireCashController::class)->group(function () {
            Route::get('/transaksi/expire', 'index');
        });

        // 4. Hapus pelamar lowongan expired
        Route::controller(DeleteExpiredPelamarController::class)->group(function () {
            Route::get('/pelamar/delete-expired', 'index');
        });

        // 5. Nonaktifkan langganan perusahaan
        Route::controller(ExpireLanggananController::class)->group(function () {
            Route::get('/langganan/expire', 'index');
        });

        // 6. Reset lowongan expired (paket, publish, expired)
        Route::controller(ResetExpiredLowonganController::class)->group(function () {
            Route::get('/lowongan/reset-expired', 'index');
        });

        // 7. Expire lamaran + notifikasi 
        Route::controller(ExpireLamaranController::class)->group(function () {
            Route::get('/lamaran/expire', 'index');
        });

        // 8. Hapus notifikasi "Lamaran Expired" > 3 hari
        Route::controller(DeleteExpiredLamaranNotifController::class)->group(function () {
            Route::get('/notifikasi/delete-lamaran-expired', 'index');
        });

        // 9. Hapus semua notifikasi expired (global)
        Route::controller(DeleteExpiredNotificationController::class)->group(function () {
            Route::get('/notifikasi/delete-expired', 'index');
        });
    });
