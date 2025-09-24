<?php

namespace App\Console\Commands;

use App\Models\PelamarLowongan;
use Illuminate\Console\Command;

class DeleteExpiredPelamar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-expired-pelamar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        PelamarLowongan::where('expired_at')
        ->where('expired_at', '<', now())
        ->delete();

        $this->info('Expired pelamar berhasil di hapus'); 
    }
}
