<?php

namespace App\Console\Commands;

use App\Models\LowonganPerusahaan;
use App\Models\Notifikasi;
use Illuminate\Console\Command;

class NotifyExpiredLowongans extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:expired-lowongans';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengirim notifikasi untuk lowongan yang sudah kadaluarsa';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Ambil semua lowongan yang expired
        $lowongans = LowonganPerusahaan::whereNotNull('published_at')
            ->whereDate('expired_at', '<=', now())
            ->get();

        foreach ($lowongans as $l) {

            // CEK jika notifikasi SUDAH ada → jangan kirim lagi
            $exists = Notifikasi::where('perusahaan_id', $l->perusahaan_id)
                ->where('judul', 'Lowongan Kadaluarsa')
                ->whereDate('expired_at', $l->expired_at)
                ->exists();

            if ($exists) {
                continue; // sudah ada notifikasi → skip
            }

            // Buat notifikasi BARU
            Notifikasi::create([
                'user_id'        => $l->perusahaan->user_id,
                'perusahaan_id'  => $l->perusahaan_id,
                'judul'          => 'Lowongan Kadaluarsa',
                'pesan'          => "Lowongan \"{$l->nama}\" telah kadaluarsa pada {$l->expired_at->format('d M Y')}.",
                'expired_at'     => $l->expired_at,
                'is_read'        => 0,
            ]);
        }

        return Command::SUCCESS;
    }
}
