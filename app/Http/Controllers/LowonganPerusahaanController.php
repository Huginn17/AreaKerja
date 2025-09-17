<?php

namespace App\Http\Controllers;

use App\Models\LowonganPerusahaan;
use App\Models\PaketLowongan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LowonganPerusahaanController extends Controller
{
    public function index()
    {

        return view('perusahaan.lowongan-saya.lowongan-kosong', [
            "Data" => LowonganPerusahaan::all(),
        ]);
    }

    public function paketform()
    {
        $perusahaan = Auth::user()->perusahaan;
        return view('perusahaan.pasang-lowongan', compact('perusahaan'));
    }

    public function createForm()
    {
        $pakets = PaketLowongan::all();
        return view('perusahaan.lowongan-saya.tambah-lowongan', compact('pakets'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $valid = $request->validate([
            "nama"    =>    "required",
            "alamat"  =>    "required",
            "jenis"   =>    "required",
            "gaji_awal"  =>   "required",
            "gaji_akhir"  =>   "required",
            "deskripsi"   =>    "required",
            "syarat_pekerjaan"  =>   "required",
            "batas_lamaran"        =>   "required"
        ]);


        $valid['perusahaan_id'] = Auth::user()->perusahaan->id;
        $valid['slug'] = Str::slug($request->nama . '-' . time());
        $valid['tanggung_jawab'] = Auth::user()->perusahaan->nama_perusahaan;
        LowonganPerusahaan::create($valid);
        return redirect()->route('lowongan.saya.perusahaan')->with('success', 'Lowongan berhasil ditambahkan!');
    }

    public function show(LowonganPerusahaan $lowongan)
    {
        return view('perusahaan.lowongan-saya.detail-lowongan', [
            "data" => $lowongan,
            "Data" => LowonganPerusahaan::all(),
        ]);
    }

    public function edit()
    {
        return view('perusahaan.lowongan-saya.edit');
    }

    public function update(Request $request, LowonganPerusahaan $lowongan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string',
            'gaji_awal' => 'nullable|numeric',
            'gaji_akhir' => 'nullable|numeric',
            'alamat' => 'nullable|string',
            'kategori' => 'nullable|string',
            'batas_lamaran' => 'nullable|date',
        ]);

        $lowongan->update($request->all());

        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil diperbarui.');
    }

    public function destroy(LowonganPerusahaan $lowongan)
    {
        $lowongan->delete();
        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil dihapus.');
    }

    public function publish(Request $request, LowonganPerusahaan $lowongan)
    {
        $perusahaan = Auth::user()->perusahaan;

        // Pastikan lowongan punya paket
        if (!$lowongan->paket_id) {
            return redirect()->route('paket.form')
                ->with('error', 'Anda belum memilih paket lowongan. Silakan beli paket terlebih dahulu.');
        }

        $paket = PaketLowongan::find($lowongan->paket_id);

        // Cek apakah sudah pernah publish
        if ($lowongan->published_at) {
            return redirect()->route('paket.form')
                ->with('error', 'Lowongan ini sudah dipublish. Untuk publish baru silakan beli paket lagi.');
        }

        // Cek saldo koin perusahaan
        if ($perusahaan->koin_perusahaan < $paket->harga) {
            return redirect()->route('perusahaan.dashboard')
                ->with('error', 'Koin Anda tidak cukup. Silakan top up terlebih dahulu.');
        }

        // Publish
        $lowongan->update([
            'published_at' => now(),
            'expired_at' => now()->addDays($paket->batas_listing),
        ]);

        // Potong koin perusahaan
        $perusahaan->decrement('koin_perusahaan', $paket->harga);

        return redirect()->route('lowongan.saya.perusahaan')
            ->with('success', 'Lowongan berhasil dipublish dan aktif selama ' . $paket->batas_listing . ' hari.');
    }

    //beli paket 
    public function beliPaket(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'paket_id'    => 'required|exists:paket_lowongans,id',
            'lowongan_id' => 'required|exists:lowongan_perusahaans,id',
        ]);

        $perusahaan = Auth::user()->perusahaan;
        $paket = PaketLowongan::findOrFail($request->paket_id);

        // Ambil lowongan yang dipilih & pastikan milik perusahaan yang login
        $lowongan = LowonganPerusahaan::where('perusahaan_id', $perusahaan->id)
            ->where('id', $request->lowongan_id)
            ->first();

        if (!$lowongan) {
            return redirect()->back()->with('error', 'Lowongan tidak ditemukan atau bukan milik perusahaan Anda.');
        }

        // Update lowongan dengan paket
        $lowongan->update([
            'paket_id'   => $paket->id,
            // 'status'     => 'draft',
            'expired_at' => now()->addDays($paket->batas_listing),
        ]);

        return redirect()->route('lowongan.saya.perusahaan')
            ->with('success', "Paket {$paket->nama} berhasil dibeli dan dipasang ke lowongan {$lowongan->nama}. Expired dalam {$paket->batas_listing} hari.");
    }
}
