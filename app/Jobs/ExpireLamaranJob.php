<?php

namespace App\Jobs;

use App\Models\Notifikasi;
use App\Models\PelamarLowongan;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ExpireLamaranJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        $lams = PelamarLowongan::whereNotNull('expired_at')
            ->where('expired_at', '<=', Carbon::now())
            ->with(['lowongan_perusahaan.perusahaan', 'pelamar', 'notifikasi'])
            ->get();

        foreach ($lams as $lam) {
            $pid    = $lam->id;
            $userId = $lam->pelamar->user_id ?? null;

            Log::info("ExpireLamaranJob: processing pelamar_lowongan_id={$pid}, user_id={$userId}");

            // --- 1) Temukan notifikasi "diterima" yang terkait lamaran ini (fleksibel)
            $acceptedQuery = Notifikasi::query()
                ->where('pelamar_lowongan_id', $pid)
                // lower-case compare judul supaya case-insensitive
                ->whereRaw('LOWER(judul) LIKE ?', ['%diterima%']);

            $accepted = $acceptedQuery->get();
            Log::info("ExpireLamaranJob: found accepted notifs count=" . $accepted->count() . " for pelamar_lowongan_id={$pid}");

            // Hapus jika ada
            if ($accepted->count() > 0) {
                $deleted = $acceptedQuery->delete();
                Log::info("ExpireLamaranJob: deleted accepted notifs count={$deleted} for pelamar_lowongan_id={$pid}");
            } else {
                Log::info("ExpireLamaranJob: no accepted notif to delete for pelamar_lowongan_id={$pid}");
            }

            // --- 2) Cek apakah notifikasi expired sudah ada
            $existsExpired = Notifikasi::where('pelamar_lowongan_id', $pid)
                ->whereRaw('LOWER(judul) = ?', [strtolower('Lamaran Expired')])
                ->exists();

            // --- 3) Buat notifikasi expired bila belum ada
            if (! $existsExpired) {
                $judulLowongan = $lam->lowongan_perusahaan->judul ?? '—';
                $namaPerusahaan = $lam->lowongan_perusahaan->perusahaan->nama_perusahaan ?? '—';
                $expiredDate = $lam->expired_at
                    ? Carbon::parse($lam->expired_at)->format('d M Y')
                    : Carbon::now()->format('d M Y');


                Notifikasi::create([
                    'user_id'             => $userId,
                    'pelamar_lowongan_id' => $pid,
                    'judul'               => 'Lamaran Expired',
                    'pesan'               => "Lamaran Anda untuk posisi <b>{$judulLowongan}</b> di perusahaan <b>{$namaPerusahaan}</b> telah expired pada tanggal <b>{$expiredDate}</b>.",
                    'is_read'             => 0,
                ]);

                Log::info("ExpireLamaranJob: created 'Lamaran Expired' notif for pelamar_lowongan_id={$pid}");
            } else {
                Log::info("ExpireLamaranJob: 'Lamaran Expired' already exists for pelamar_lowongan_id={$pid}");
            }
        }
    }
}
