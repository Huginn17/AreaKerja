<?php

namespace App\Http\Controllers\Schedules;
use App\Http\Controllers\Controller;

use App\Models\PelamarLowongan;
use Illuminate\Http\Request;

class DeleteExpiredPelamarController extends Controller
{
    /**
     * Menghapus lamaran pelamar
     * yang sudah melewati expired_at
     */
    public function index()
    {
        $deleted = PelamarLowongan::whereNotNull('expired_at')
            ->where('expired_at', '<', now())
            ->delete();

        return response()->json([
            'task'    => 'delete_expired_pelamar',
            'deleted' => $deleted,
        ]);
    }
}
