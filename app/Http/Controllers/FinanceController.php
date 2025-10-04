<?php

namespace App\Http\Controllers;

use App\Models\CatatanCash;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function verifikasi($id, Request $request)
    {
        $transaksi = CatatanCash::findOrFail($id);
        $perusahaan = $transaksi->user->perusahaan;
        $paket = $transaksi->hargaPembayaran;
        $pelamar = $transaksi->user->pelamar;

        if ($request->action == 'terima' && $transaksi->status !== 'diterima') {
            $transaksi->status = 'diterima';
            $transaksi->save();

            // Kalau transaksi TOP UP → tambah koin
            if ($paket && $paket->jumlah_koin > 0) {
                $perusahaan->koin_perusahaan += $paket->jumlah_koin;
                $perusahaan->save();
            } else {
                // Kalau transaksi PENDAFTARAN KANDIDAT → ubah kategori jadi calon kandidat
                if ($pelamar) {
                    $pelamar->kategori = 'calon kandidat';
                    $pelamar->save();
                }
            }
        } elseif ($request->action == 'tolak' && $transaksi->status === 'diterima') {
            $transaksi->status = 'ditolak';
            $transaksi->save();

            // Kalau transaksi TOP UP → rollback koin
            if ($paket && $paket->jumlah_koin > 0) {
                $perusahaan->koin_perusahaan -= $paket->jumlah_koin;
                if ($perusahaan->koin_perusahaan < 0) {
                    $perusahaan->koin_perusahaan = 0;
                }
                $perusahaan->save();
            } else {
                // Kalau transaksi PENDAFTARAN KANDIDAT → rollback kategori jadi pelamar lagi
                if ($pelamar) {
                    $pelamar->kategori = 'pelamar';
                    $pelamar->save();
                }
            }
        } elseif ($request->action == 'tolak') {
            // Tolak langsung dari pending → hanya ubah status
            $transaksi->status = 'ditolak';
            $transaksi->save();
        }

        return redirect()->route('finance.laporan')
            ->with('success', 'Transaksi berhasil diverifikasi: ' . $transaksi->status);
    }



    public function laporan(Request $request)
    {
        $query = CatatanCash::with(['user', 'hargaPembayaran', 'bank']);

        if ($request->periode) {
            $query->where('created_at', '>=', now()->subMonths($request->periode));
        }

        $transaksi = $query->orderBy('created_at', 'desc')->take(10)->get();

        return view('finance.catatan-tran', compact('transaksi'));
    }

    public function detail($id)
    {
        $transaksi = CatatanCash::with(['user', 'hargaPembayaran', 'bank'])->findOrFail($id);

        return response()->json([
            'id' => $transaksi->id,
            'user' => $transaksi->user->name ?? '-',
            'email' => $transaksi->user->email ?? '-',
            'bank' => $transaksi->bank->nama_bank ?? '-',
            'nomor_rekening' => $transaksi->bank->nomor_rekening ?? '-',
            'harga' => number_format($transaksi->hargaPembayaran->harga ?? 0, 0, ',', '.'),
            'jumlah_koin' => $transaksi->hargaPembayaran->jumlah_koin ?? 0,
            'status' => ucfirst($transaksi->status),
            'created_at' => $transaksi->created_at->format('d M Y H:i')
        ]);
    }

    public function hal_detail()
    {
        $transaksi = CatatanCash::with(['user', 'bank', 'hargaPembayaran'])->latest()->get();
        return view('finance.detail-cat-koin', compact('transaksi'));
    }
}
