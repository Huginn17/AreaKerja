<?php

namespace App\Http\Controllers;

use App\Models\LowonganPerusahaan;
use App\Models\Notifikasi;
use App\Models\PelamarLowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelamarLowonganController extends Controller
{
    public function storeQuick(Request $request, LowonganPerusahaan $lowongan)
    {
        $user = Auth::user();

        if (! $user) {
            return response()->json([
                'success' => false,
                'not_login' => true,
                'message' => 'Anda harus login terlebih dahulu untuk melamar.'
            ], 401);
        }

        if (! $user->pelamar) {
            return response()->json([
                'success' => false,
                'message'  => 'Harap login sebagai pelamar.'
            ], 403);
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


        // NOTIFIKASI
        // Ambil user perusahaan (pembuat lowongan)
        $perusahaan = $lowongan->perusahaan;       // dari model LowonganPerusahaan
        $userPerusahaan = $perusahaan->user ?? null; // user perusahaan (id ini tujuan notifikasi)

        if ($userPerusahaan) {
            Notifikasi::create([
                'user_id' => $userPerusahaan->id, // penerima notifikasi
                'judul'   => 'Lamaran Baru Masuk',
                'pesan' => '<b>' . $pelamar->nama_pelamar .
                    '</b> telah mengajukan lamaran untuk posisi <b>' . $lowongan->nama .
                    '</b>. Silakan tinjau detail kandidat melalui dashboard perusahaan.',
                'is_read' => false,
            ]);
        }

        if (! $user || ! $user->pelamar) {
            return response()->json([
                'success' => false,
                'unauthenticated' => true,
                'redirect' => route('login'),
                'message' => 'Harap login terlebih dahulu untuk melamar.'
            ]);
        }
    }
}
