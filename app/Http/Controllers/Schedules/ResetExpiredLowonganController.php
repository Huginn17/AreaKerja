<?php

namespace App\Http\Controllers\Schedules;

use App\Http\Controllers\Controller;
use App\Models\LowonganPerusahaan;
use Illuminate\Http\Request;

class ResetExpiredLowonganController extends Controller
{
    /**
     * Mereset paket dan status publish
     * lowongan yang sudah expired
     */
    public function index()
    {
        $updated = LowonganPerusahaan::whereNotNull('expired_at')
            ->where('expired_at', '<=', now())
            ->update([
                'paket_id'     => null,
                'published_at' => null,
                'expired_at'   => null,
            ]);

        return response()->json([
            'task'    => 'reset_expired_lowongan',
            'updated' => $updated,
        ]);
    }
}
