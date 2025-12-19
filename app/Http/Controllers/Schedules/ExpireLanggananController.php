<?php

namespace App\Http\Controllers\Schedules;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExpireLanggananController extends Controller
{
    /**
     * Menonaktifkan langganan perusahaan
     * jika tanggal expired telah lewat
     */
    public function index()
    {
        $today = Carbon::today();

        $expired = Perusahaan::where('is_berlangganan', 1)
            ->whereDate('tanggal_expired', '<', $today)
            ->get();

        foreach ($expired as $p) {
            $p->update(['is_berlangganan' => 0]);
        }

        return response()->json([
            'task'  => 'expire_langganan',
            'count' => $expired->count(),
        ]);
    }
}
