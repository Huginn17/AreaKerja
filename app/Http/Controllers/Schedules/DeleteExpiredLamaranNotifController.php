<?php

namespace App\Http\Controllers\Schedules;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use Carbon\Carbon;
use Illuminate\Http\Request;


class DeleteExpiredLamaranNotifController extends Controller
{
    /**
     * Menghapus notifikasi "Lamaran Expired"
     * yang sudah lebih dari 3 hari
     */
    public function index()
    {
        $deleted = Notifikasi::whereIn('judul', [
            'Lamaran Expired',
            'Lowongan Kadaluarsa',
        ])
            ->whereNotNull('expired_at')
            ->where('expired_at', '<=', now())
            ->delete();

        return response()->json([
            'task'    => 'cleanup_expired_notifications',
            'deleted' => $deleted,
        ]);
    }
}
