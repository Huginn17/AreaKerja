<?php

namespace App\Http\Controllers\Schedules;
use App\Http\Controllers\Controller;

use App\Models\CatatanCash;
use Illuminate\Http\Request;

class ExpireCashController extends Controller
{
    /**
     * Mengubah status transaksi pending
     * menjadi expired jika lewat expired_at
     */
    public function index()
    {
        $updated = CatatanCash::where('status', 'pending')
            ->where('expired_at', '<=', now())
            ->update(['status' => 'expired']);

        return response()->json([
            'task'    => 'expire_cash_transaction',
            'updated' => $updated,
        ]);
    }
}
