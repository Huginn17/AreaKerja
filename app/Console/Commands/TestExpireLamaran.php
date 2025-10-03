<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\ExpireLamaranJob;

class TestExpireLamaran extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:expire-lamaran';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Menjalankan job ExpireLamaran secara manual';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        dispatch(new ExpireLamaranJob());

        $this->info('Job ExpireLamaran berhasil dijalankan.');
    }
}
