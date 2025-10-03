<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\DeleteExpiredNotifJob;

class TestDeleteExpiredNotif extends Command
{
    protected $signature = 'test:delete-expired-notif';
    protected $description = 'Test hapus notifikasi lamaran expired lebih dari 3 hari';

    public function handle()
    {
        (new DeleteExpiredNotifJob())->handle();
        $this->info('Job DeleteExpiredNotif berhasil dijalankan.');
    }
}
