<?php

namespace App\Http\Controllers;

use App\Models\LowonganPerusahaan;
use App\Models\Pelamar;
use App\Models\PelamarLowongan;
use App\Models\RiwayatPendidikan;
use App\Models\SimpanLowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PgSql\Lob;
use Illuminate\Support\Facades\DB;


class PelamarController extends Controller
{
    public function detail_lowongan_non_user(LowonganPerusahaan $lowongan)
    {
        $Data = LowonganPerusahaan::with('perusahaan')
            ->whereNotNull('published_at')
            ->where(function ($q) {
                $q->whereNull('expired_at')
                    ->orWhere('expired_at', '>', now());
            })
            ->latest()
            ->get();
        return view('non-user.lowongan-detail', [
            "data" => $lowongan,
            "Data" => $Data
        ]);
    }
    public function index()
    {

        $Data = LowonganPerusahaan::with('perusahaan')
            ->whereNotNull('published_at')
            ->where(function ($q) {
                $q->whereNull('expired_at')
                    ->orWhere('expired_at', '>', now());
            })
            ->latest()
            ->get();
        $notifs = collect(); // default kosong

        if (auth()->check() && auth()->user()->role === 'pelamar') {
            $pelamarId = auth()->user()->pelamar->id;

            $notifs = PelamarLowongan::with(['lowongan_perusahaan.perusahaan', 'jadwal_wawancara'])
                ->where('pelamar_id', $pelamarId)
                ->whereIn('status', ['diterima', 'ditolak'])
                ->orderBy('created_at', 'desc')
                ->get();
        }

        $unreadCount = $notifs->whereStrict('is_read', 0)->count();
        $lowongan = LowonganPerusahaan::latest()->get();
        return view('non-user.home', [
            "lowongan" => $lowongan,
            "Data" => $Data,
            "notifs" => $notifs,
            "unreadCount" => $unreadCount
        ]);
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



    //LAMARAN PELAMAR
    public function lamar_cepat(Request $request)
    {
        $request->validate([
            'lowongan_id' => 'required',
        ]);

        $pelamar = Pelamar::where('user_id', Auth::id())->firstOrFail();

        $pelamar->lowongans()->attach($request->lowongan_id, [
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return back()->with('success', 'Lamaran berhasil dikirim');
    }

    public function konfirmasi_hal(PelamarLowongan $pelamarlowongan)
    {
        $jadwal = $pelamarlowongan->jadwal_wawancara()->latest()->first();
        return view('perusahaan.pelamar.terima-pelamar', [
            "data" => $pelamarlowongan,
            "jadwal" => $jadwal
        ]);
    }

    public function konfirmasi_simpan(Request $request, PelamarLowongan $pelamarlowongan)
    {
        // dd($request->all());
        $val = $request->validate([
            'tanggal' => 'required|date',
            // 'waktu' => 'required',
            'jam' => 'required',
            'menit' => 'required',
            'tempat' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        $val['waktu'] = str_pad($val['jam'], 2, '0', STR_PAD_LEFT) . ':' . str_pad($val['menit'], 2, '0', STR_PAD_LEFT);

        unset($val['jam'], $val['menit']);

        $jadwal = $pelamarlowongan->jadwal_wawancara()->updateOrCreate([
            'pelamar_lowongan_id' => $pelamarlowongan->id
        ], $val);

        return redirect()->route('pelamar.detail', $pelamarlowongan->id)->with('jadwal', $jadwal);;
    }

    public function kirim(PelamarLowongan $pelamarlowongan)
    {
        $pelamarlowongan->update([
            "status" => "diterima",
            "expired_at" => now()->addDays(30)
        ]);

        return redirect()->route('perusahaan.pelamar', ['lowongan' => $pelamarlowongan->lowongan_perusahaan->slug]);
    }

    public function preview(PelamarLowongan $pelamarlowongan)
    {

        $jadwal = $pelamarlowongan->jadwal_wawancara()->latest()->first();

        return view('perusahaan.pelamar.konfirmasi-terkirim', [
            "data" => $pelamarlowongan,
            "jadwal" => $jadwal
        ]);
    }

    //NOTIFIKASI LAMARAN PELAMAR
    public function notifikasi()
    {
        $pelamarId = auth()->user()->pelamar->id;

        $notifs = PelamarLowongan::with(['lowongan_perusahaan.perusahaan', 'jadwal_wawancara'])
            ->where('pelamar_id', $pelamarId)
            ->whereIn('status', ['diterima', 'ditolak'])
            ->where(function($q){
                $q->whereNull('expired_at')
                ->orWhere('expired_at', '>', now());
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $unreadCount = $notifs->whereStrict('is_read', 0)->count();

        return redirect()->route('pelamar.notifikasi.show', [
            'notifs' => $notifs,
            'unreadCount' => $unreadCount
        ]);
    }

    public function showNotif(PelamarLowongan $notif,)
    {

        $pelamarId = auth()->user()->pelamar->id;

        $notifs = PelamarLowongan::with(['lowongan_perusahaan.perusahaan', 'jadwal_wawancara'])
            ->where('pelamar_id', $pelamarId)
            ->whereIn('status', ['diterima', 'ditolak'])
            ->orderBy('created_at', 'desc')
            ->get();

        if ($notif->pelamar_id !== auth()->user()->pelamar->id) {
            abort(403);
        };

        if (!$notif->is_read) {
            $notif->timestamps = false;
            $notif->is_read = true;
            $notif->save();
        }

        return view('non-user.notifikasi.notif', [
            'notif' => $notif,
            'notifs' => $notifs
        ]);
    }


    public function semuaDibaca()
    {
        $pelamarId = auth()->user()->pelamar->id;

        PelamarLowongan::where('pelamar_id', $pelamarId)
            ->where('is_read', false)
            ->update([
                'is_read' => true,
                'updated_at' => DB::raw('updated_at')
            ]);

        return response()->json(['success' => true]);
    }
}
