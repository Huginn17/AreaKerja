<?php

namespace App\Console\Commands;

use App\Jobs\ExpireLamaranJob;
use Illuminate\Console\Command;

class ExpireLamaranCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:expire-lamaran-command';

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
        ExpireLamaranJob::dispatch();

        $this->info('✅ Job ExpireLamaran sudah dijalankan.');
        return Command::SUCCESS;
    }
}
