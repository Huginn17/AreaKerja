<?php

namespace App\Http\Controllers;

use App\Models\CatatanCash;
use App\Models\HargaPembayaran;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CatatanCashController extends Controller
{
    //simpan transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'harga_pembayaran_id' => 'required|exists:harga_pembayarans,id',
            'daftar_bank_id' => 'required|exists:daftar_bank,id',
        ]);

        $harga = HargaPembayaran::findOrFail($request->harga_pembayaran_id);

        $transaksi = CatatanCash::create([
            'user_id' => Auth::id(),
            'harga_pembayaran_id' => $request->harga_pembayaran_id,
            'daftar_bank_id' => $request->daftar_bank_id,
            'no_referensi' => strtoupper(Str::random(10)),
            'pesanan' => "Top Up Koin - {$harga->nama}",
            'dari' => Auth::user()->name,
            'sumberDana' => 'Transfer Bank',
            'total' => $harga->harga,
            'status' => 'pending',
        ]);

        return redirect()->route('catatan_cash.show', $transaksi->id);
    }

    //halaman detail transaksi
    public function show($id)
    {
        $transaksi = CatatanCash::with('hargaPembayaran', 'bank')->findOrFail($id);
        return view('finance.catatan_cash.show', compact('transaksi'));
    }

    //upload bukti transaksi
    public function uploadBukti(Request $request, $id)
    {
        $transaksi = CatatanCash::findOrFail($id);

        $request->validate([
            'bukti' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('bukti')->store('bukti-transfer', 'public');

        $transaksi->update([
            'bukti' => $path,
            'status' => 'menunggu verifikasi',
        ]);
        return redirect()->route('catatan_cash.show', $transaksi->id)
            ->with('success', 'Bukti transfer berhasil diupload.');
    }

    //finance update status 
    public function updateStatus(Request $request, $id)
    {
      $transaksi = CatatanCash::findOrFail($id);

      $request->validate([
        'status' => 'required|in:diterima,ditolak',
      ]);

      $transaksi->update([
         'status' => $request->status
      ]);

      //jika diterima, tambahkan koin perusahaan
      if ($request->status == 'diterima') {
          $perusahaan = Perusahaan::where('user_id', $transaksi->user_id)->first();
          if($perusahaan){
            $perusahaan->incerment('koin_perusahaan', $transaksi->hargaPembayaran->jumlah_koin);
          }
      }
       return back()->with('success', 'Status transaksi berhasil diperbarui.');
    }
}
