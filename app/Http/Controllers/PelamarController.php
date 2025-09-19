<?php

namespace App\Http\Controllers;

use App\Models\LowonganPerusahaan;
use App\Models\RiwayatPendidikan;
use App\Models\SimpanLowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelamarController extends Controller
{
    public function index()
    {
        $lowongan = LowonganPerusahaan::latest()->get();
        return view('non-user.home', compact('lowongan'));
    }

    //SIMPAN LOWONGAN 
    public function store(Request $request)
    {
        $request->validate([
            'lowongan_id' => 'required|exists:lowongan_perusahaans,id',
        ]);

        $pelamar = Auth::user()->pelamar;

        // Cek apakah sudah pernah disimpan
        $cek = SimpanLowongan::where('pelamar_id', $pelamar->id)
            ->where('lowongan_id', $request->lowongan_id)
            ->first();

        if ($cek) {
            return back()->with('info', 'Lowongan sudah ada di daftar simpan.');
        }

        SimpanLowongan::create([
            'pelamar_id' => $pelamar->id,
            'lowongan_id' => $request->lowongan_id,
        ]);

        return back()->with('success', 'Lowongan berhasil disimpan.');
    }

    // Hapus lowongan dari simpan
    public function destroy($lowonganId)
    {
        $pelamar = Auth::user()->pelamar;

        $simpan = SimpanLowongan::where('pelamar_id', $pelamar->id)
            ->where('lowongan_id', $lowonganId)
            ->first();

        if (! $simpan) {
            return redirect()->back()->with('error', 'Lowongan tidak ditemukan di daftar simpan.');
        }

        $simpan->delete();

        return redirect()->back()->with('success', 'Lowongan berhasil dihapus dari daftar simpan.');
    }

    public function lowongansimpanform()
    {
        $pelamar = Auth::user()->pelamar;
        $simpanlowongan = SimpanLowongan::with('lowongan.perusahaan')
            ->where('pelamar_id', $pelamar->id)
            ->latest()
            ->get();

        return view('non-user.lowongan-tersimpan', compact('simpanlowongan'));
    }

    //RIWAYAT PENDIDIKAN
    public function storependidikan(Request $request)
    {
        // dd($request->all());
        $valid = $request->validate([
            'pendidikan' => 'required',
            'jurusan' => 'nullable',
            'asal_pendidikan' => 'nullable',
            'tahun_awal' => 'nullable',
            'tahun_akhir' => 'nullable'
        ]);

        $valid['pelamar_id'] = Auth::user()->pelamar->id;

        RiwayatPendidikan::create($valid);
        return redirect()->route('profile.index')->with('success', 'Pendidikan berhasil disimpan');
    }

    public function updatependidikan(Request $request, RiwayatPendidikan $riwayatpendidikan)
    {
        $valid = $request->validate([
            'pendidikan' => 'required',
            'jurusan' => 'nullable',
            'asal_pendidikan' => 'nullable',
            'tahun_awal' => 'nullable',
            'tahun_akhir' => 'nullable'
        ]);

        $valid['pelamar_id'] = Auth::user()->pelamar->id;

        $riwayatpendidikan->update($valid);
        return redirect()->route('profile.index')->with('success', 'Pendidikan berhasil diperbarui');
    }

    public function editpendidikan(RiwayatPendidikan $riwayatpendidikan)
    {
        return view('non-user.profile.pendidikan.edit', ['DT' => $riwayatpendidikan]);
    }

     public function destroypendidikan(RiwayatPendidikan $riwayatpendidikan)
    {
        $riwayatpendidikan->delete();
        return redirect()->back()->with('success', 'Organisasi berhasil dihapus');
    }
}
