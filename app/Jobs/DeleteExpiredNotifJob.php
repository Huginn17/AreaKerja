<?php

namespace App\Jobs;

use App\Models\Notifikasi;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeleteExpiredNotifJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $limit = Carbon::now()->subDays(3);

        $deleted = Notifikasi::where('judul', 'Lamaran Expired')
            ->where('created_at', '<=', $limit)
            ->delete();

        echo "Notifikasi expired yang dihapus: {$deleted}\n";
    }
}
