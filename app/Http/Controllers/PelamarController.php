<?php

namespace App\Http\Controllers;

use App\Mail\KonfirmasiLamaranMail;
use App\Models\CatatanCash;
use App\Models\DaftarBank;
use App\Models\Divisi;
use App\Models\HargaPembayaran;
use App\Models\LowonganPerusahaan;
use App\Models\Notifikasi;
use App\Models\Pelamar;
use App\Models\PelamarLowongan;
use App\Models\PembeliKandidat;
use App\Models\RiwayatPendidikan;
use App\Models\SimpanLowongan;
use App\Models\TipsKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PelamarController extends Controller
{
    public function detail_lowongan_non_user(LowonganPerusahaan $lowongan)
    {
        $pelamar = auth()->user()->pelamar ?? null;
        if (!$pelamar) abort(403);

        // Ambil semua lowongan aktif (untuk sidebar)
        $Data = LowonganPerusahaan::with('perusahaan')
            ->whereNotNull('published_at')
            ->where(function ($q) {
                $q->whereNull('expired_at')->orWhere('expired_at', '>', now());
            })
            ->latest()
            ->get();

        // CEK apakah lowongan ini sudah disimpan oleh pelamar
        $isSaved = SimpanLowongan::where('pelamar_id', $pelamar->id)
            ->where('lowongan_id', $lowongan->id)
            ->exists();

        // Ambil tawaran, bisa null
        $tawaran = PembeliKandidat::with(['lowonganPerusahaan.perusahaan'])
            ->where('pelamar_id', $pelamar->id)
            ->where('lowongan_perusahaan_id', $lowongan->id)
            ->first();

        // Ambil lowongan lain, menyesuaikan apakah ada tawaran atau tidak
        if ($tawaran && $tawaran->lowonganPerusahaan) {
            $lowonganLain = LowonganPerusahaan::where('perusahaan_id', $tawaran->lowonganPerusahaan->perusahaan_id)
                ->where('id', '!=', $tawaran->lowongan_perusahaan_id)
                ->whereNotNull('published_at')
                ->latest()
                ->take(3)
                ->get();
        } else {
            $lowonganLain = LowonganPerusahaan::where('id', '!=', $lowongan->id)
                ->whereNotNull('published_at')
                ->latest()
                ->take(3)
                ->get();
        }

        return view('non-user.lowongan-detail', [
            'data' => $lowongan,
            'Data' => $Data,
            'isSaved' => $isSaved,
            'lowonganLain' => $lowonganLain,
            'tawaran' => $tawaran,
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

        $lowongan = LowonganPerusahaan::latest()->get();

        return view('non-user.home', [
            "lowongan" => $lowongan,
            "Data" => $Data,

        ]);
    }

    //SIMPAN LOWONGAN 
    public function store(Request $request)
    {
        $request->validate([
            'lowongan_id' => 'required|exists:lowongan_perusahaans,id',
        ]);

        $pelamar = Auth::user()->pelamar;

        $cek = SimpanLowongan::where('pelamar_id', $pelamar->id)
            ->where('lowongan_id', $request->lowongan_id)
            ->first();

        if ($cek) {
            return response()->json([
                'success' => false,
                'message' => 'Lowongan sudah ada di daftar simpan.'
            ]);
        }

        SimpanLowongan::create([
            'pelamar_id' => $pelamar->id,
            'lowongan_id' => $request->lowongan_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Lowongan berhasil disimpan.'
        ]);
    }


    public function destroy($lowonganId)
    {
        $pelamar = Auth::user()->pelamar;

        $simpan = SimpanLowongan::where('pelamar_id', $pelamar->id)
            ->where('lowongan_id', $lowonganId)
            ->first();

        if (!$simpan) {
            return response()->json([
                'message' => 'Lowongan tidak ditemukan di daftar simpan.'
            ], 404);
        }

        $simpan->delete();

        return response()->json([
            'message' => 'Lowongan berhasil dihapus.'
        ], 200);
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

    // RIWAYAT PENDIDIKAN
    public function storependidikan(Request $request)
    {
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
        return redirect()->back()->with('success', 'Pendidikan berhasil dihapus');
    }

    // RIWAYAT PENDIDIKAN SUper ADmin
    public function storependidikanSuper(Request $request)
    {
        $valid = $request->validate([
            'pendidikan' => 'required',
            'jurusan' => 'nullable',
            'asal_pendidikan' => 'nullable',
            'tahun_awal' => 'nullable',
            'tahun_akhir' => 'nullable'
        ]);
        $pelamar_id = session('pelamar_terakhir_id');

        if (!$pelamar_id) {
            return back()->with('error', 'Pelamar belum dibuat. Harap buat pelamar terlebih dahulu sebelum menambahkan pendidikan.');
        }

        $valid['pelamar_id'] = $pelamar_id;

        RiwayatPendidikan::create($valid);

        $pelamar = Pelamar::find($pelamar_id);


        $mapKategori = [
            'pelamar' => 'non_kandidat',
            'calon kandidat' => 'calon_kandidat',
            'kandidat aktif' => 'kandidat',
            'kandidat nonaktif' => 'kandidat_nonaktif',
        ];

        $kategori = $mapKategori[strtolower($pelamar->kategori)] ?? 'non_kandidat';

        return redirect()->route('superadmin.pelamar.create', ['kategori' => $kategori])
            ->with('success', 'Organisasi berhasil disimpan');
    }

    public function updatependidikanSuper(Request $request, ?RiwayatPendidikan $riwayatpendidikan = null)
    {

        $valid = $request->validate([
            'pelamar_id' => 'required|exists:pelamars,id',
            'pendidikan' => 'required',
            'jurusan' => 'nullable',
            'asal_pendidikan' => 'nullable',
            'tahun_awal' => 'nullable',
            'tahun_akhir' => 'nullable'
        ]);

        // Tidak perlu ambil dari session, karena sudah dari request
        $pelamar_id = $valid['pelamar_id'];

        if ($riwayatpendidikan && $riwayatpendidikan->exists) {
            $riwayatpendidikan->update($valid);
        } else {
            $riwayatpendidikan = RiwayatPendidikan::create($valid);
        }

        $pelamar = Pelamar::find($pelamar_id);

        $mapKategori = [
            'pelamar' => 'non_kandidat',
            'calon kandidat' => 'calon_kandidat',
            'kandidat aktif' => 'kandidat',
            'kandidat nonaktif' => 'kandidat_nonaktif',
        ];

        $kategori = $mapKategori[strtolower($pelamar->kategori)] ?? 'non_kandidat';

        return redirect()->route('superadmin.pelamar.edit', [
            'kategori' => $kategori,
            'id' => $pelamar_id
        ])->with('success', 'Data pendidikan berhasil disimpan.');
    }



    public function editpendidikanSuper(RiwayatPendidikan $riwayatpendidikan)
    {
        return view('super_admin.pelamar.modal.edit.edit_pendidikan', ['DT' => $riwayatpendidikan]);
    }

    public function destroypendidikanSuper(RiwayatPendidikan $riwayatpendidikan)
    {
        $riwayatpendidikan->delete();
        return redirect()->back()->with('success', 'Pendidikan berhasil dihapus');
    }

    // LAMARAN PELAMAR
    public function lamar_cepat(Request $request)
    {
        $request->validate([
            'lowongan_id' => 'required|exists:lowongan_perusahaans,id',
        ]);

        $pelamar = Pelamar::where('user_id', Auth::id())->firstOrFail();

        $pelamar->lowongans()->attach($request->lowongan_id, [
            'status'     => 'pending',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return back()->with('success', 'Lamaran berhasil dikirim');
    }

    // FORM KONFIRMASI
    public function konfirmasi_hal(PelamarLowongan $pelamarlowongan)
    {
        return view('perusahaan.pelamar.terima-pelamar', [
            "data" => $pelamarlowongan
        ]);
    }

    // SIMPAN INPUTAN FORM KE SESSION
    public function konfirmasi_simpan(Request $request, PelamarLowongan $pelamarlowongan)
    {
        $val = $request->validate([
            'tanggal' => 'required|date',
            'jam'     => 'required|numeric',
            'menit'   => 'required|numeric',
            'tempat'  => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        $val['waktu'] = str_pad($val['jam'], 2, '0', STR_PAD_LEFT) . ':' . str_pad($val['menit'], 2, '0', STR_PAD_LEFT);
        unset($val['jam'], $val['menit']);

        session(['konfirmasi' => $val]);

        return redirect()->route('pelamar.detail', $pelamarlowongan->id);
    }

    // PREVIEW
    public function preview(PelamarLowongan $pelamarlowongan)
    {
        $konfirmasi = session('konfirmasi');

        if (!$konfirmasi) {
            return redirect()->route('pelamar.konfirmasi', $pelamarlowongan->id)
                ->with('error', 'Isi form konfirmasi terlebih dahulu.');
        }

        return view('perusahaan.pelamar.konfirmasi-terkirim', [
            "data"       => $pelamarlowongan,
            "konfirmasi" => $konfirmasi
        ]);
    }




    // KIRIM EMAIL + BUAT NOTIFIKASI
    public function kirim(PelamarLowongan $pelamarlowongan)
    {
        $pelamar = $pelamarlowongan->pelamar;
        $konfirmasi = session('konfirmasi');

        if (!$konfirmasi) {
            return redirect()->route('pelamar.konfirmasi', $pelamarlowongan->id)
                ->with('error', 'Data konfirmasi tidak ditemukan.');
        }

        $expiredAt = now()->addDays(30);

        // Update status + expired_at
        $pelamarlowongan->update([
            "status"      => "diterima",
            "expired_at"  => $expiredAt,
        ]);

        Mail::to($pelamar->user->email)
            ->send(new KonfirmasiLamaranMail(
                $pelamar,
                $pelamarlowongan->lowongan_perusahaan,
                $konfirmasi,
                $pelamarlowongan
            ));

        $statusText = $pelamarlowongan->status === 'diterima' ? 'Diterima' : 'Ditolak';
        $statusColor = $statusText === 'Diterima' ? 'green' : 'red';

        Notifikasi::create([
            'user_id' => $pelamar->user_id,
            'pelamar_lowongan_id' => $pelamarlowongan->id,
            'judul'   => "Lamaran {$statusText}",
            'pesan'   => "Lamaran yang anda ajukan ke <b>{$pelamarlowongan->lowongan_perusahaan->perusahaan->nama_perusahaan}</b> 
                  divisi <b>{$pelamarlowongan->lowongan_perusahaan->nama}</b> 
                  <span style='color:{$statusColor}; font-weight:bold;'>{$statusText}</span>. 
                  Masa berlaku lamaran sampai tanggal <b>{$expiredAt->format('d M Y')}</b>.",
        ]);

        session()->forget('konfirmasi');

        return redirect()->route('perusahaan.pelamar', [
            'lowongan' => $pelamarlowongan->lowongan_perusahaan->slug
        ])->with('success', 'Lamaran diterima, email konfirmasi & notifikasi sudah dikirim.');
    }

    public function tolak(PelamarLowongan $pelamarlowongan)
    {
        $pelamar = $pelamarlowongan->pelamar;

        $pelamarlowongan->update([
            'status' => 'ditolak',
            'expired_at' => null,
        ]);

        Mail::to($pelamar->user->email)
            ->send(new KonfirmasiLamaranMail(
                $pelamar,
                $pelamarlowongan->lowongan_perusahaan,
                null,
                $pelamarlowongan
            ));

        Notifikasi::create([
            'user_id' => $pelamar->user_id,
            'pelamar_lowongan_id' => $pelamarlowongan->id,
            'judul'   => "Lamaran Ditolak",
            'pesan'   => "Lamaran anda ke <b>{$pelamarlowongan->lowongan_perusahaan->perusahaan->nama_perusahaan}</b> 
              divisi <b>{$pelamarlowongan->lowongan_perusahaan->nama}</b> 
              <span style='color:red; font-weight:bold;'>Ditolak</span>. 
              Terima kasih telah melamar, semoga sukses di kesempatan berikutnya.",
        ]);

        session()->forget('konfirmasi');

        return redirect()->route('perusahaan.pelamar', [
            'lowongan' => $pelamarlowongan->lowongan_perusahaan->slug
        ])->with('success', 'Lamaran ditolak, email & notifikasi sudah dikirim.');
    }




    // NOTIFIKASI
    public function baca($id)
    {
        $notif = Notifikasi::where('user_id', auth()->id())
            ->where('id', $id)
            ->firstOrFail();

        $notif->update(['is_read' => 1]);

        return response()->json(['success' => true]);
    }



    public function bacaSemua()
    {
        $userId = auth()->id();

        $updated = Notifikasi::where('user_id', $userId)
            ->where('is_read', 0)
            ->update(['is_read' => 1]);

        dd($userId, $updated, Notifikasi::where('user_id', $userId)->get());
    }


    public function hapus($id)
    {
        $notif = Notifikasi::where('user_id', auth()->id())
            ->where('id', $id)
            ->firstOrFail();

        $notif->delete();

        return response()->json(['success' => true]);
    }

    public function hapusSemua()
    {
        $userId = auth()->id();

        $deleted = Notifikasi::where('user_id', $userId)
            ->delete();

        return response()->json([
            'success' => true,
            'deleted' => $deleted
        ]);
    }

    public function hapusSemuaBaca()
    {
        $userId = auth()->id();

        // Hapus hanya yang is_read = 1
        $deleted = Notifikasi::where('user_id', $userId)
            ->where('is_read', 1)
            ->delete();

        return response()->json([
            'success' => true,
            'deleted' => $deleted
        ]);
    }





    //TIPS KERJA
    public function tips_kerja()
    {
        $head = TipsKerja::where('status', 'terbit')
            ->orderBy('created_at', 'desc')
            ->first();

        $others = TipsKerja::where('status', 'terbit')
            ->when($head, function ($query) use ($head) {
                return $query->where('id', '!=', $head->id);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('non-user.tips-kerja', [
            "head" => $head,
            "others" => $others
        ]);
    }

    public function detail($id)
    {
        $artikel = TipsKerja::findOrFail($id);

        $related = TipsKerja::where('id', '!=', $id)
            ->where('status', 'terbit')
            ->latest()
            ->take(3)
            ->get();

        //   $artikel->increment('views');

        return view('non-user.tips-kerja1', [
            "artikel" => $artikel,
            "related" => $related
        ]);
    }

    //HAL DAFTAR KANDIDAT
    public function daftar_kandidat()
    {
        $divisis = Divisi::all();
        return view('non-user.daftar-kandidat', [
            "divisis" => $divisis,
            'daftarBank' => DaftarBank::all(),
        ]);
    }

    public function transaksi($id)
    {
        $transaksi = CatatanCash::with(['hargaPembayaran', 'bank'])->findOrFail($id);
        return view('kandidat.transaksi-tf-bank', [
            "transaksi" => $transaksi,
            'daftarBank' => DaftarBank::all(),
        ]);
    }

    public function uploadBukti(Request $request, $id)
    {
        $transaksi = CatatanCash::findOrFail($id);

        $request->validate([
            'bukti' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('bukti')->store('bukti-transfer', 'public');

        $transaksi->update([
            'bukti' => $path,
            'status' => 'menunggu_verifikasi',
        ]);
        return redirect()->route('kandidat.transaksi', $transaksi->id)
            ->with('success', 'Bukti transfer berhasil diupload.');
    }

    public function storePendaftaran(Request $request)
    {
        $request->validate([
            'divisi' => 'required|string',
            'daftar_bank_id' => 'required|exists:daftar_bank,id',
        ]);
        $user = auth()->user();

        $pelamar = $user->pelamar;
        if ($pelamar) {
            $pelamar->divisi = $request->divisi;
            $pelamar->save();
        }
        $harga = HargaPembayaran::where('nama', 'Pendaftaran Kandidat')->first();

        $transaksi = CatatanCash::create([
            'user_id' => Auth::id(),
            'harga_pembayaran_id' => $harga->id,
            'daftar_bank_id' => $request->daftar_bank_id,
            'no_referensi' => 'INV' . strtoupper(uniqid()),
            'pesanan' => 'Pendaftaran Kandidat',
            'dari' => Auth::user()->pelamar->nama_pelamar ?? Auth::user()->username,
            'sumberDana' => 'Transfer Bank',
            'total' => $harga->harga,
            'status' => 'pending',
            'expired_at' => now()->addHours(24),
        ]);

        return redirect()->route('kandidat.transaksi', $transaksi->id);
    }
}
