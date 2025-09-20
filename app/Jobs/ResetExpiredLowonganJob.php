<?php

namespace App\Jobs;

use App\Models\LowonganPerusahaan;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ResetExpiredLowonganJob implements ShouldQueue
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
         LowonganPerusahaan::whereNotNull('expired_at')
            ->where('expired_at', '<=', now())
            ->update([
                'paket_id'     => null,
                'published_at' => null,
                'expired_at'   => null,
            ]);
    }
}
