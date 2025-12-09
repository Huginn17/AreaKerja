<?php

namespace App\Http\Controllers;

use App\Mail\KonfirmasiLamaranMail;
use App\Models\CatatanCash;
use App\Models\Category;
use App\Models\DaftarBank;
use App\Models\Divisi;
use App\Models\HargaPembayaran;
use App\Models\LowonganPerusahaan;
use App\Models\Notifikasi;
use App\Models\Pelamar;
use App\Models\PelamarLowongan;
use App\Models\PembeliKandidat;
use App\Models\Perusahaan;
use App\Models\RiwayatPendidikan;
use App\Models\SimpanLowongan;
use App\Models\TipsKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PelamarController extends Controller
{

    public function pasangLowongan()
    {
        return view('non-user.pasang-lowongan');
    }

    public function talentHunter()
    {
        return view('non-user.talent-hunter');
    }

    public function bantuan()
    {
        return view('non-user.faq');
    }

    public function syaratKetentuan()
    {
        return view('layouts.syarat-dan-ketentuan');
    }



    public function detail_lowongan_non_user(Perusahaan $perusahaan, LowonganPerusahaan $lowongan)
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

        // Ambil lowongan lain (di perusahaan yang sama atau umum)
        if ($tawaran && $tawaran->lowonganPerusahaan) {
            $lowonganLain = LowonganPerusahaan::where('perusahaan_id', $tawaran->lowonganPerusahaan->perusahaan_id)
                ->where('id', '!=', $tawaran->lowongan_perusahaan_id)
                ->whereNotNull('published_at')
                ->where(function ($q) {
                    $q->whereNull('expired_at')->orWhere('expired_at', '>', now());
                })
                ->latest()
                ->take(3)
                ->get();
        } else {
            $lowonganLain = LowonganPerusahaan::where('id', '!=', $lowongan->id)
                ->whereNotNull('published_at')
                ->where(function ($q) {
                    $q->whereNull('expired_at')->orWhere('expired_at', '>', now());
                })
                ->latest()
                ->take(3)
                ->get();
        }
        // Tambahan keamanan → pastikan lowongan ini milik perusahaan yang ada di URL
        if ($lowongan->perusahaan_id !== $perusahaan->id) {
            abort(404);
        }

        return view('non-user.lowongan-detail', [
            'data' => $lowongan,
            'Data' => $Data,
            'isSaved' => $isSaved,
            'lowonganLain' => $lowonganLain,
            'tawaran' => $tawaran,
        ]);
    }


    public function detail_lowongan_non_userShare(Perusahaan $perusahaan, LowonganPerusahaan $lowongan)
    {
        // Cek user pelamar
        $pelamar = auth()->user()->pelamar ?? null;
        if (!$pelamar) abort(403);

        // Pastikan lowongan milik perusahaan di URL
        if ($lowongan->perusahaan_id !== $perusahaan->id) {
            abort(404);
        }

        // Ambil sidebar data
        $Data = LowonganPerusahaan::with('perusahaan')
            ->whereNotNull('published_at')
            ->where(function ($q) {
                $q->whereNull('expired_at')->orWhere('expired_at', '>', now());
            })
            ->latest()
            ->get();

        // Apakah disimpan?
        $isSaved = SimpanLowongan::where('pelamar_id', $pelamar->id)
            ->where('lowongan_id', $lowongan->id)
            ->exists();

        // Ambil tawaran
        $tawaran = PembeliKandidat::with(['lowonganPerusahaan.perusahaan'])
            ->where('pelamar_id', $pelamar->id)
            ->where('lowongan_perusahaan_id', $lowongan->id)
            ->first();

        // Ambil lowongan lain
        if ($tawaran && $tawaran->lowonganPerusahaan) {
            $lowonganLain = LowonganPerusahaan::where('perusahaan_id', $tawaran->lowonganPerusahaan->perusahaan_id)
                ->where('id', '!=', $tawaran->lowongan_perusahaan_id)
                ->whereNotNull('published_at')
                ->where(function ($q) {
                    $q->whereNull('expired_at')->orWhere('expired_at', '>', now());
                })
                ->latest()
                ->take(3)
                ->get();
        } else {
            $lowonganLain = LowonganPerusahaan::where('id', '!=', $lowongan->id)
                ->whereNotNull('published_at')
                ->where(function ($q) {
                    $q->whereNull('expired_at')->orWhere('expired_at', '>', now());
                })
                ->latest()
                ->take(3)
                ->get();
        }

        // Kirim ke view
        return view('non-user.lowongan-detail', [
            'data' => $lowongan,
            'Data' => $Data,
            'isSaved' => $isSaved,
            'lowonganLain' => $lowonganLain,
            'tawaran' => $tawaran,
        ]);
    }





    public function index(Request $request)
    {
        // Ambil kategori dari query string
        $kategori = $request->query('kategori');

        // Jika kategori ada → simpan, filter, lalu redirect ke URL bersih
        if ($kategori) {
            return redirect()
                ->to('/pelamar/home')
                ->with('kategori_filter', $kategori);
        }

        // Ambil kategori dari session ONLY untuk 1x
        $kategori = session()->pull('kategori_filter');

        $KategoriList = Category::pluck('nama');

        $Data = LowonganPerusahaan::with('perusahaan')
            ->whereNotNull('published_at')
            ->when($kategori, function ($q) use ($KategoriList, $kategori) {
                if ($KategoriList->contains($kategori)) {
                    $q->where('kategori', $kategori);
                }
            })
            ->orderByRaw('rekomendasi IS NULL') // yang NULL (tidak direkomendasikan) turun ke bawah
            ->orderBy('rekomendasi', 'asc')     // rekomendasi tertua → paling kiri/atas
            ->orderBy('created_at', 'asc')      // jika timestamp rekomendasi sama → yang dibuat paling lama naik
            ->get();


        return view('non-user.home', [
            "Data" => $Data,
            "KategoriList" => $KategoriList,
            "kategori" => $kategori,
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
            return back()->with('error', 'Lowongan sudah ada di daftar simpan.');
        }

        SimpanLowongan::create([
            'pelamar_id' => $pelamar->id,
            'lowongan_id' => $request->lowongan_id,
        ]);

        return back()->with('success', 'Lowongan berhasil disimpan.');
    }


    public function destroy($id)
    {
        // dd($lowonganId);

        $pelamar = Auth::user()->pelamar;

        $simpan = SimpanLowongan::where('pelamar_id', $pelamar->id)
            ->where('lowongan_id', $id)
            ->first();

        if (!$simpan) {
            return response()->json([
                'message' => 'Lowongan tidak ditemukan di daftar simpan.'
            ], 404);
        }

        $simpan->delete();

        return back()->with('success', 'Lowongan berhasil dihapus.');
    }

    public function lowongansimpanform()
    {
        $pelamar = Auth::user()->pelamar;

        $simpanlowongan = SimpanLowongan::with('lowongan.perusahaan')
            ->where('pelamar_id', $pelamar->id)
            ->whereHas('lowongan', function ($q) {
                $q->whereNotNull('published_at')
                    ->where(function ($q2) {
                        $q2->whereNull('expired_at')
                            ->orWhere('expired_at', '>', now());
                    });
            })
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
            'tahun_awal' => 'nullable|digits:4|integer',
            'tahun_akhir' => 'nullable|gte:tahun_awal|digits:4|integer',
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
            'tahun_awal' => 'nullable|digits:4|integer',
            'tahun_akhir' => 'nullable|gte:tahun_awal|digits:4|integer',
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
            'tahun_awal' => 'nullable|digits:4|integer',
            'tahun_akhir' => 'nullable|gte:tahun_awal|digits:4|integer',
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
            'tahun_awal' => 'nullable|digits:4|integer',
            'tahun_akhir' => 'nullable|gte:tahun_awal|digits:4|integer',
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
            'perusahaan_id' => $pelamarlowongan->lowongan_perusahaan->perusahaan_id,
            'pelamar_lowongan_id' => $pelamarlowongan->id,
            'judul'   => "Lamaran {$statusText}",
            'pesan'   => "Lamaran yang anda ajukan ke <b>{$pelamarlowongan->lowongan_perusahaan->perusahaan->nama_perusahaan}</b> 
                  divisi <b>{$pelamarlowongan->lowongan_perusahaan->nama}</b> 
                  <span style='color:{$statusColor}; font-weight:bold;'>{$statusText}</span>. 
                  Masa berlaku lamaran sampai tanggal <b>{$expiredAt->format('d M Y')}</b>.",
            'expired_at' => now()->addDays(7),

        ]);

        session()->forget('konfirmasi');

        return redirect()->route('perusahaan.dashboard', [
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
            'perusahaan_id' => $pelamarlowongan->lowongan_perusahaan->perusahaan_id,
            'judul'   => "Lamaran Ditolak",
            'pesan'   => "Lamaran anda ke <b>{$pelamarlowongan->lowongan_perusahaan->perusahaan->nama_perusahaan}</b> 
              divisi <b>{$pelamarlowongan->lowongan_perusahaan->nama}</b> 
              <span style='color:red; font-weight:bold;'>Ditolak</span>. 
              Terima kasih telah melamar, semoga sukses di kesempatan berikutnya.",
            'expired_at' => now()->addDays(7),
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
            'bukti' => 'required|mimes:jpg,jpeg,png,pdf|max:5120',
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

        // Update divisi pelamar
        if ($user->pelamar) {
            $user->pelamar->update(['divisi' => $request->divisi]);
        }

        $bank = DaftarBank::findOrFail($request->daftar_bank_id);

        // Harga pendaftaran wajib ada
        $harga = HargaPembayaran::where('nama', 'Pendaftaran Kandidat')->firstOrFail();

        // Sumber dana
        $sumberDana = strtolower($bank->nama_bank) === 'qris'
            ? 'Qris'
            : 'Transfer Bank';

        $dari = $user->pelamar->nama_pelamar ?? $user->username;

        // Buat transaksi
        $transaksi = CatatanCash::create([
            'user_id' => $user->id,
            'harga_pembayaran_id' => $harga->id,
            'daftar_bank_id' => $request->daftar_bank_id,
            'no_referensi' => 'INV' . strtoupper(uniqid()),
            'pesanan' => 'Pendaftaran Kandidat',
            'dari' => $dari,
            'sumberDana' => $sumberDana,
            'total' => $harga->harga,
            'status' => 'pending',
            'expired_at' => now()->addHours(24),
        ]);

        return redirect()->route('kandidat.transaksi', $transaksi->id);
    }





    //SEARCH LOWONGAN
    public function searchLowongan(Request $request)
    {
        $previous = url()->previous();

        // Jangan simpan jika previous URL nya adalah URL search
        if (!str_contains($previous, '/search')) {
            session()->put('last_non_search_url', $previous);
        }

        $posisi = $request->posisi;
        $lokasi = $request->lokasi;

        // Ambil Kategori untuk menghindari error di Blade
        $KategoriList = Category::pluck('nama');
        $kategori = session()->get('kategori_filter'); // jaga konsistensi filter kategori

        // Jika posisi & lokasi kosong → tampilkan normal saja
        if (empty($posisi) && empty($lokasi)) {

            $lowongan = LowonganPerusahaan::with(['perusahaan.alamatUtama'])
                ->whereNotNull('published_at')
                ->where(function ($q) {
                    $q->whereNull('expired_at')
                        ->orWhere('expired_at', '>', now());
                })
                ->latest()
                ->paginate(12);

            return view('non-user.home', [
                'Data' => $lowongan,
                'lowongan' => $lowongan,
                'posisi' => $posisi,
                'lokasi' => $lokasi,
                'riwayat' => session()->get('riwayat_full', []),
                'KategoriList' => $KategoriList,
                'kategori' => $kategori,
            ]);
        }

        // Cari lowongan
        $lowongan = LowonganPerusahaan::query()
            ->with(['perusahaan.alamatUtama'])
            ->when($posisi, function ($q) use ($posisi) {
                $q->where(function ($q2) use ($posisi) {
                    $q2->where('nama', 'like', "%$posisi%")
                        ->orWhere('deskripsi', 'like', "%$posisi%");
                });
            })
            ->when($lokasi, function ($q) use ($lokasi) {
                $q->whereHas('perusahaan.alamatUtama', function ($alamat) use ($lokasi) {
                    $alamat->where('desa', 'like', "%$lokasi%")
                        ->orWhere('detail', 'like', "%$lokasi%")
                        ->orWhere('kode_pos', 'like', "%$lokasi%")
                        ->orWhereHas('kota', function ($kota) use ($lokasi) {
                            $kota->where('nama', 'like', "%$lokasi%");
                        })
                        ->orWhereHas('provinsi', function ($prov) use ($lokasi) {
                            $prov->where('nama', 'like', "%$lokasi%");
                        });
                });
            })
            ->whereNotNull('published_at')
            ->where(function ($q) {
                $q->whereNull('expired_at')
                    ->orWhere('expired_at', '>', now());
            })
            ->latest()
            ->paginate(12);


        // Ambil riwayat
        $riwayat = session()->get('riwayat_full', []);

        // Hapus duplikat
        $riwayat = collect($riwayat)
            ->reject(function ($item) use ($posisi, $lokasi) {
                return $item['posisi'] === $posisi && $item['lokasi'] === $lokasi;
            })
            ->values()
            ->toArray();

        // Tambahkan pencarian baru
        array_unshift($riwayat, [
            'posisi' => $posisi,
            'lokasi' => $lokasi,
            'lowongan_ids' => $lowongan->pluck('id')->toArray(),
        ]);

        // Maksimal 6 riwayat
        $riwayat = array_slice($riwayat, 0, 6);

        // Simpan
        session()->put('riwayat_full', $riwayat);

        return view('non-user.home', [
            'Data' => $lowongan,
            'lowongan' => $lowongan,
            'posisi' => $posisi,
            'lokasi' => $lokasi,
            'riwayat' => $riwayat,
            'KategoriList' => $KategoriList, // ← WAJIB ADA
            'kategori' => $kategori,
        ]);
    }

    //hapus search riwayat
    public function resetRiwayat()
    {
        session()->forget('riwayat_full');
        session()->forget('riwayat_search');

        $lastUrl = session()->get('last_non_search_url', route('beranda')); // fallback ke home

        return redirect($lastUrl)->with('success', 'Riwayat pencarian berhasil direset.');
    }




    //Transaksi
    public function transaksiPendaftaranKandidat()
    {
        $user = auth()->user();

        $transaksi = CatatanCash::where('user_id', $user->id)
            ->where('pesanan', 'Pendaftaran Kandidat')
            ->with(['hargaPembayaran', 'bank'])
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('non-user.transaksi.transaksi-kosong', [
            'transaksi' => $transaksi
        ]);
    }


    //GANTI PW
    public function updatePassword(Request $request)
    {
        // Validasi biasa
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:3',
            'new_password_confirmation' => 'required'
        ]);

        $user = $request->user();

        // ==== CEK PASSWORD BARU & KONFIRMASI ====
        if ($request->new_password !== $request->new_password_confirmation) {

            // Simpan notifikasi gagal
            Notifikasi::create([
                'user_id'    => $user->id,
                'perusahaan_id' => null,
                'judul'      => 'Gagal Mengubah Password',
                'pesan'      => 'Password baru dan konfirmasi password tidak sama.',
                'is_read'    => 0,
                'expired_at' => now()->addDays(7),
                'pelamar_lowongan_id' => null,
            ]);

            return back()->with('error', 'Password baru dan konfirmasi password tidak cocok.');
        }

        // ==== CEK PASSWORD LAMA ====
        if (!Hash::check($request->old_password, $user->password)) {

            Notifikasi::create([
                'user_id'    => $user->id,
                'perusahaan_id' => null,
                'judul'      => 'Gagal Mengubah Password',
                'pesan'      => 'Password gagal diubah karena password lama tidak sesuai.',
                'is_read'    => 0,
                'expired_at' => now()->addDays(7),
                'pelamar_lowongan_id' => null,
            ]);

            return back()->with('error', 'Password lama salah.');
        }

        // ==== UPDATE PASSWORD ====
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Notifikasi berhasil
        Notifikasi::create([
            'user_id'    => $user->id,
            'perusahaan_id' => null,
            'judul'      => 'Password Berhasil Diubah',
            'pesan'      => 'Password akun Anda berhasil diperbarui.',
            'is_read'    => 0,
            'expired_at' => now()->addDays(7),
            'pelamar_lowongan_id' => null,
        ]);

        return back()->with('success', 'Password berhasil diubah.');
    }
}
