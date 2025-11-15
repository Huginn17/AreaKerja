<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected $commands = [
        \App\Console\Commands\TestExpireLamaran::class,
        \App\Console\Commands\TestDeleteExpiredNotif::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('transaksi:cek-expired')->everyFiveMinutes();
        $schedule->job(new \App\Jobs\ResetExpiredLowonganJob)->dailyAt('00:00');
        $schedule->command('pelamar:delete-expired')->daily();
        $schedule->job(new \App\Jobs\ExpireLamaranJob)->dailyAt('00:00');
        $schedule->job(new \App\Jobs\DeleteExpiredNotifJob)->dailyAt('01:00');
        $schedule->command('langganan:cek-expired')->dailyAt('00:00');
        // Hapus notifikasi yang kadaluarsa tiap hari
        $schedule->command('notifikasi:hapus-expired')->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
