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

        // cek apakah CV sudah lengkap
        if (! $pelamar->isCvComplete()) {
            return response()->json([
                'success' => false,
                'redirect' => route('profile.index'),
                'message' => 'Harap lengkapi Profile Anda terlebih dahulu sebelum melamar.'
            ], 422);
        }

        // cek duplikat lamaran
        $existingLamaran = PelamarLowongan::where('pelamar_id', $pelamar->id)
            ->where('lowongan_id', $lowongan->id)
            ->latest()
            ->first();

        if ($existingLamaran) {
            if (in_array($existingLamaran->status, ['pending', 'diterima'])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Anda tidak dapat melamar lagi karena lamaran Anda sebelumnya masih ' . $existingLamaran->status . '.'
                ]);
            }
            // jika ditolak → lanjutkan melamar
        }

        // simpan lamaran baru
        PelamarLowongan::create([
            'pelamar_id' => $pelamar->id,
            'lowongan_id' => $lowongan->id,
            'status' => 'pending',
        ]);

        // Notifikasi ke perusahaan
        $perusahaan = $lowongan->perusahaan;
        $userPerusahaan = $perusahaan->user ?? null;

        if ($userPerusahaan) {
            Notifikasi::create([
                'user_id' => $userPerusahaan->id,
                'judul'   => 'Lamaran Baru Masuk',
                'pesan' => '<b>' . $pelamar->nama_pelamar .
                    '</b> telah mengajukan lamaran untuk posisi <b>' . $lowongan->nama .
                    '</b>. Silakan tinjau detail kandidat melalui dashboard perusahaan.',
                'is_read' => false,
                'expired_at' => now()->addDays(7),
            ]);
        }

        // RESPONSE SUKSES
        return response()->json([
            'success' => true,
            'message' => 'Lamaran berhasil dikirim!'
        ]);
    }
    }
