<?php

namespace App\Http\Controllers\Schedules;
use App\Http\Controllers\Controller;

use App\Models\LowonganPerusahaan;
use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifyExpiredLowonganController extends Controller
{
    /**
     * Mengirim notifikasi ke perusahaan
     * jika lowongan sudah kadaluarsa
     */
    public function index()
    {
        $sent = 0;

        $lowongans = LowonganPerusahaan::whereNotNull('published_at')
            ->whereDate('expired_at', '<=', now())
            ->get();

        foreach ($lowongans as $l) {

            $exists = Notifikasi::where('perusahaan_id', $l->perusahaan_id)
                ->where('judul', 'Lowongan Kadaluarsa')
                ->whereDate('expired_at', $l->expired_at)
                ->exists();

            if ($exists) continue;

            Notifikasi::create([
                'user_id'       => $l->perusahaan->user_id,
                'perusahaan_id' => $l->perusahaan_id,
                'judul'         => 'Lowongan Kadaluarsa',
                'pesan'         => "Lowongan \"{$l->nama}\" telah kadaluarsa.",
                'expired_at'    => $l->expired_at,
                'is_read'       => 0,
            ]);

            $sent++;
        }

        return response()->json([
            'task' => 'notify_expired_lowongan',
            'sent' => $sent,
        ]);
    }
}
