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
        $limit = Carbon::now()->subDays(3);

        $deleted = Notifikasi::where('judul', 'Lamaran Expired')
            ->where('created_at', '<=', $limit)
            ->delete();

        return response()->json([
            'task'    => 'delete_expired_lamaran_notif',
            'deleted' => $deleted,
        ]);
    }
}
