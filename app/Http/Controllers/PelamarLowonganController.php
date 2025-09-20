<?php

namespace App\Http\Controllers;

use App\Models\LowonganPerusahaan;
use App\Models\PelamarLowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelamarLowonganController extends Controller
{
    public function storeQuick(Request $request, LowonganPerusahaan $lowongan)
    {
        $user = Auth::user();
        if (! $user || ! $user->pelamar) {
            return response()->json(['success' => false, 'message' => 'Harap login sebagai pelamar.'], 403);
        }

        $pelamar = $user->pelamar;

        // cek apakah CV sudah lengkap (dari relasi)
        if (! $pelamar->isCvComplete()) {
            return response()->json([
                'success' => false,
                'redirect' => route('profile.index'),
                'message' => 'Harap lengkapi CV Anda terlebih dahulu sebelum melamar.'
            ], 422);
        }

        // cek duplikat lamaran
        $exists = PelamarLowongan::where('pelamar_id', $pelamar->id)
            ->where('lowongan_id', $lowongan->id)
            ->exists();

        if ($exists) {
            return response()->json(['success' => false, 'message' => 'Anda sudah melamar lowongan ini.']);
        }

        // simpan lamaran
        PelamarLowongan::create([
            'pelamar_id' => $pelamar->id,
            'lowongan_id' => $lowongan->id,
            'status' => 'pending',
        ]);
        

        return response()->json([
            'success' => true,
            'message' => 'Lamaran berhasil dikirim.'
        ]);
    }
}
