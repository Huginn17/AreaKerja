<?php

namespace App\Http\Controllers;

use App\Models\CatatanKoin;
use App\Models\Hargakoin;
use App\Models\LowonganPerusahaan;
use App\Models\PaketLowongan;
use App\Models\Perusahaan;
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

        // Ambil semua paket (Gold, Silver, Bronze)
        $pakets = PaketLowongan::whereIn('nama', ['Gold', 'Silver', 'Bronze'])->get();

        // Ambil semua harga berdasarkan nama paket
        $hargaKoins = HargaKoin::whereIn('nama', [
            'Pasang Lowongan Bronze',
            'Pasang Lowongan Silver',
            'Pasang Lowongan Gold'
        ])->get()->keyBy('nama');

        foreach ($pakets as $paket) {
            $namaHarga = 'Pasang Lowongan ' . $paket->nama;
            $paket->harga = $hargaKoins[$namaHarga]->harga ?? 0;
        }

        return view('perusahaan.pasang-lowongan', compact('perusahaan', 'pakets'));
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
            "batas_lamaran"        =>   "required",
            'kategori' => 'required'
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

    public function edit(LowonganPerusahaan $lowongan)
    {
        return view('perusahaan.lowongan-saya.edit', [
            "data" => $lowongan
        ]);
    }

    public function update(Request $request, LowonganPerusahaan $lowongan)
    {
        $valid = $request->validate([
            'nama' => 'nullable|string|max:255',
            'jenis' => 'nullable|string',
            'gaji_awal' => 'nullable|numeric',
            'gaji_akhir' => 'nullable|numeric',
            'alamat' => 'nullable|string',
            'kategori' => 'nullable|string',
            'batas_lamaran' => 'nullable|date',
            'deskripsi' => 'nullable|string',
            'syarat_pekerjaan' => 'nullable|string',
        ]);

        $valid['perusahaan_id'] = Auth::user()->perusahaan->id;
        $lowongan->update($valid);
        return redirect()->route('lowongan.detail', $lowongan->id)->with('success', 'Lowongan berhasil diperbarui.');
    }

    public function destroy(LowonganPerusahaan $lowongan)
    {
        $lowongan->delete();
        return redirect()->route('lowongan.saya.perusahaan')->with('success', 'Lowongan berhasil dihapus.');
    }

    public function publish(Request $request, LowonganPerusahaan $lowongan)
    {
        $perusahaan = Auth::user()->perusahaan;
        $user = Auth::user();

        // Pastikan lowongan milik perusahaan login
        if ($lowongan->perusahaan_id !== $perusahaan->id) {
            return redirect()->back()->with('error', 'Lowongan tidak valid.');
        }

        if ($lowongan->expired_at && $lowongan->expired_at > now()) {
            return redirect()->back()->with('error', 'Lowongan ini masih aktif dan belum bisa dipublish ulang.');
        }

        // Pastikan lowongan punya paket
        if (!$lowongan->paket_id) {
            return redirect()->route('paket.form')
                ->with('error', 'Lowongan ini belum memiliki paket. Silakan beli paket dulu.');
        }

        $paket = PaketLowongan::find($lowongan->paket_id);
        if (!$paket) {
            return redirect()->back()->with('error', 'Paket tidak ditemukan.');
        }

        if ($lowongan->expired_at && $lowongan->expired_at < now() && $lowongan->published_at !== null) {
            $lowongan->update(['paket_id' => null]);

            return redirect()
                ->route('paket.form')
                ->with('error', 'Masa aktif paket sebelumnya telah habis. Silakan beli paket baru untuk mempublish ulang lowongan ini.');
        }


        $lowongan->update([
            'published_at' => now(),
            'expired_at'   => now()->addDays($paket->batas_listing),
        ]);

        return redirect()->route('lowongan.saya.perusahaan')
            ->with('success', 'Lowongan berhasil dipublish dan aktif selama ' . $paket->batas_listing . ' hari.');
    }






    /**
     * Beli paket lalu ikatkan ke lowongan
     */
    public function beliPaket(Request $request)
    {
        $request->validate([
            'paket_id'    => 'required|exists:paket_lowongans,id',
            'lowongan_id' => 'required|exists:lowongan_perusahaans,id',
        ]);

        $perusahaan = Auth::user()->perusahaan;
        $paket = PaketLowongan::findOrFail($request->paket_id);

        // 🔹 Ambil harga dari relasi harga_koins berdasarkan nama paket
        $namaHarga = 'Pasang Lowongan ' . $paket->nama;
        $hargaKoin = HargaKoin::where('nama', $namaHarga)->first();

        if (!$hargaKoin) {
            return redirect()->back()->with('error', 'Harga untuk paket ini belum diatur.');
        }

        // Simpan harga ke variabel
        $harga = $hargaKoin->harga;

        // 🔹 Pastikan lowongan milik perusahaan
        $lowongan = LowonganPerusahaan::where('perusahaan_id', $perusahaan->id)
            ->where('id', $request->lowongan_id)
            ->first();

        if (!$lowongan) {
            return redirect()->back()->with('error', 'Lowongan tidak ditemukan atau bukan milik Anda.');
        }

        // 🔹 Cek saldo koin perusahaan
        if ($perusahaan->koin_perusahaan < $harga) {
            return redirect()->route('paket.form')
                ->with('koin_kurang', true);
        }

        // 🔹 Potong koin
        $perusahaan->decrement('koin_perusahaan', $harga);

        // 🔹 Reset paket lama jika sudah expired atau ada paket baru
        $lowongan->update([
            'paket_id'     => $paket->id,
            'published_at' => null, // reset agar bisa publish ulang
            'expired_at'   => null, // akan diisi saat publish
        ]);

        // 🔹 Ikatkan paket ke lowongan (belum publish)
        $lowongan->update([
            'paket_id'   => $paket->id,
            'published_at' => null,
            'expired_at'   => null,
        ]);

        return redirect()->route('lowongan.saya.perusahaan')
            ->with('success', "Paket {$paket->nama} berhasil dibeli dan diikatkan ke lowongan {$lowongan->nama}. Silakan klik Publish untuk mengaktifkan.");
    }


    //REKOMENDASI
    public function toggleRekomendasi($id)
    {
        $lowongan = LowonganPerusahaan::findOrFail($id);

        $lowongan->rekomendasi = $lowongan->rekomendasi ? 0 : 1;
        $lowongan->save();

        $pesan = $lowongan->rekomendasi
            ? 'Lowongan berhasil dijadikan rekomendasi.'
            : 'Lowongan berhasil dihapus dari rekomendasi.';

        return redirect()->back()->with('success', $pesan);
    }



    //SUPER ADMIN
    public function createFormSuper($id)
    {
        $pakets = PaketLowongan::all();
        $perusahaan = Perusahaan::findOrFail($id);
        return view('super_admin.perusahaan.tambah-lowongan', [
            'perusahaan' => $perusahaan,
            'pakets' => $pakets
        ]);
    }

    public function storeSuper(Request $request, $id)
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
            "batas_lamaran"        =>   "required",
            'kategori' => 'required'
        ]);

        $perusahaan = Perusahaan::findOrFail($id);

        $valid['perusahaan_id'] = $perusahaan->id;
        $valid['slug'] = Str::slug($request->nama . '-' . time());
        $valid['tanggung_jawab'] = $perusahaan->nama_perusahaan;
        LowonganPerusahaan::create($valid);
        return redirect()->route('superadmin.perusahaan.detail', $perusahaan->id)->with('success', 'Lowongan berhasil ditambahkan!');
    }

    // public function showSuper(LowonganPerusahaan $lowongan)
    // {
    //     return view('super_admin.perusahaan.detail-lowongan', [
    //         "data" => $lowongan,
    //         "Data" => LowonganPerusahaan::all(),
    //     ]);
    // }

    public function editSuper(LowonganPerusahaan $lowongan)
    {
        return view('super_admin.perusahaan.edit-lowongan', [
            "lowongan" => $lowongan
        ]);
    }

    public function updateSuper(Request $request, LowonganPerusahaan $lowongan)
    {
        $valid = $request->validate([
            'nama' => 'nullable|string|max:255',
            'jenis' => 'nullable|string',
            'gaji_awal' => 'nullable|numeric',
            'gaji_akhir' => 'nullable|numeric',
            'alamat' => 'nullable|string',
            'kategori' => 'nullable|string',
            'batas_lamaran' => 'nullable|date',
            'deskripsi' => 'nullable|string',
            'syarat_pekerjaan' => 'nullable|string',
        ]);

        $valid['perusahaan_id'] = $lowongan->perusahaan->id;
        if ($request->filled('nama')) {
            $valid['slug'] = Str::slug($request->nama . '-' . time());
        }
        $lowongan->update($valid);
        return redirect()->route('superadmin.lowongan.detail', $lowongan->id)->with('success', 'Lowongan berhasil diperbarui.');
    }


    public function destroySuper(LowonganPerusahaan $lowongan)
    {
        $perusahaanId = $lowongan->perusahaan_id;
        $lowongan->delete();
        return redirect()->route('superadmin.perusahaan.detail',$perusahaanId)->with('success', 'Lowongan berhasil dihapus.');
    }
}
