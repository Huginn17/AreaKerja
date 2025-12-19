<?php

namespace App\Http\Controllers\Schedules;
use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use Illuminate\Http\Request;

class DeleteExpiredNotificationController extends Controller
{
    /**
     * Menghapus semua notifikasi
     * yang expired_at sudah lewat
     */
    public function index()
    {
        $deleted = Notifikasi::whereNotNull('expired_at')
            ->where('expired_at', '<', now())
            ->delete();

        return response()->json([
            'task'    => 'delete_expired_notification',
            'deleted' => $deleted,
        ]);
    }
}
