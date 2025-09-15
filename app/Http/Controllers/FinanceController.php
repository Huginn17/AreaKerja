<?php

namespace App\Http\Controllers;

use App\Models\CatatanCash;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function verifikasi($id, Request $request)
    {
        $transaksi = CatatanCash::findOrFail($id);

        if ($request->action == 'terima') {
            $transaksi->status = 'diterima';
            $transaksi->save();

            // ✅ Tambahkan koin ke perusahaan
            if ($transaksi->user && $transaksi->user->perusahaan && $transaksi->hargaPembayaran) {
                $perusahaan = $transaksi->user->perusahaan;
                $perusahaan->koin_perusahaan += $transaksi->hargaPembayaran->jumlah_koin;
                $perusahaan->save();
            }
        } elseif ($request->action == 'tolak') {
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

        $transaksi = $query->orderBy('created_at', 'desc')->get();

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
}
