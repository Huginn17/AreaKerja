<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\CatatanCash;
use App\Models\CatatanKoin;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\LowonganPerusahaan;
use App\Models\Notifikasi;
use App\Models\Pelamar;
use App\Models\PembeliKandidat;
use App\Models\Perusahaan;
use App\Models\Provinsi;
use App\Models\TalentHunter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function profile_admin()
    {
        return view('admin.profile.profile');
    }

    public function edit_profile(Admin $admin)
    {
        $provinsis = Provinsi::all();
        $admin->load(['kota', 'kecamatan', 'provinsi']);
        return view(
            'admin.profile.edit-profile',
            [
                "data" => $admin,
                'provinsis' => $provinsis
            ]
        );
    }

    public function getKota($provinsi_id)
    {
        return response()->json(Kota::where('provinsi_id', $provinsi_id)->get());
    }

    public function getKecamatan($kota_id)
    {
        return response()->json(Kecamatan::where('kota_id', $kota_id)->get());
    }

    public function update_profile_admin(Request $request, Admin $admin)
    {
        $validated = $request->validate([
            'name'     => "nullable|string",
            'email'    => "nullable|email",

        ]);

        $user = User::where('id', $admin->user_id);
        $user->update($validated);

        $valid = $request->validate([
            "nama_lengkap"  => 'nullable|string',
            "img_profile"   => 'nullable|file|image|mimes:png,jpg,jpeg',
            'provinsi_id'  => 'nullable|exists:provinsis,id',
            'kota_id'      => 'nullable|exists:kotas,id',
            'kecamatan_id' => 'nullable|exists:kecamatans,id',
            "desa"          => 'nullable|string',
            "kode_pos"      => 'nullable',
            "detail_alamat" => 'nullable|string'
        ]);

        if ($request->hasFile('img_profile')) {
            // Hapus foto lama jika ada
            if ($admin->img_profile && Storage::exists('public/' . $admin->img_profile)) {
                Storage::delete('public/' . $admin->img_profile);
            }

            // Simpan foto baru ke storage/app/public/images
            $valid['img_profile'] = $request->file('img_profile')->store('images', 'public');
        }


        $valid['user_id'] = Auth::user()->id;
        $admin->update($valid);
        return redirect()->route('admin.profile')
            ->with('success', 'Profile berhasil diupdate');
    }

    public function destroy_profile(Admin $admin)
    {
        if ($admin->img_profile && Storage::exists('public/' . $admin->img_profile)) {
            Storage::delete('public/' . $admin->img_profile);
        }

        $admin->img_profile = null;
        $admin->save();
        return redirect()->route('admin.edit.profile')->with('success', 'Profile berhasil dihapus');
    }


    //CALON KANDIDAT
    public function halCalonKandidat(Request $request)
    {
        $query = Pelamar::with('user')
            ->where('kategori', 'calon kandidat');

        // Jika ada kata kunci pencarian
        if ($search = $request->query('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_pelamar', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($u) use ($search) {
                        $u->where('username', 'like', "%{$search}%");
                    });
            });
        }

        $pelamar = $query->orderBy('nama_pelamar')->get();

        return view('admin.pelamar.calon_kandidat.calon-kandidat', compact('pelamar'));
    }


    public function detailCalonKandidat($id)
    {
        $pelamar = Pelamar::findOrFail($id);
        return view('admin.pelamar.calon_kandidat.detail-data-calon-kandidat', [
            'pelamar' => $pelamar
        ]);
    }

    public function updateTraining(Request $request, $id)
    {
        $request->validate([
            'mulai_pelatihan' => 'required|date',
            'selesai_pelatihan' => 'required|date|after:mulai_pelatihahn',
        ]);

        $pelamar = Pelamar::findOrFail($id);
        $pelamar->mulai_pelatihan = $request->mulai_pelatihan;
        $pelamar->selesai_pelatihan = $request->selesai_pelatihan;
        $pelamar->save();

        return back()->with('success', '');
    }

    public function lulus($id)
    {
        $pelamar = Pelamar::findOrFail($id);
        $pelamar->kategori = 'kandidat aktif';
        $pelamar->save();

        return redirect()->route('admin.calon-kandidat')->with('success', 'Kandidat berhasil diluluskan.');
    }

    public function gugur($id)
    {
        $pelamar = Pelamar::findOrFail($id);
        $pelamar->kategori = 'pelamar';
        $pelamar->save();

        return redirect()->route('admin.non-kandidat')->with('success', 'Kandidat dinyatakan gugur.');
    }



    //NON KANDIDAT
    public function halNonKandidat(Request $request)
    {
        $query = Pelamar::with('user')
            ->where('kategori', 'pelamar');

        // Jika ada kata kunci pencarian
        if ($search = $request->query('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_pelamar', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($u) use ($search) {
                        $u->where('username', 'like', "%{$search}%");
                    });
            });
        }

        $pelamar = $query->orderBy('nama_pelamar')->get();

        return view('admin.pelamar.non_kandidat.non-kandidat', [
            'pelamar' => $pelamar
        ]);
    }

    public function detailNonKandidat($id)
    {
        $pelamar = Pelamar::findOrFail($id);
        $logoPath = public_path('images/logoarea.png');
        $logoBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath));
        return view('admin.pelamar.non_kandidat.detail-data-non-kandidat', [
            'pelamar' => $pelamar,
            'logoBase64' => $logoBase64,
            'sosmed' => $pelamar->sosmed
        ]);
    }

    //KANDIDAT 
    public function halKandidat(Request $request)
    {
        $query = Pelamar::join('users', 'pelamars.user_id', '=', 'users.id')
            ->where('pelamars.kategori', 'kandidat aktif')
            ->select('pelamars.*', 'users.username');

        // Jika ada input pencarian username
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('users.username', 'like', "%{$search}%")
                    ->orWhere('pelamars.nama_pelamar', 'like', "%{$search}%"); // ubah ke nama_pelamar
            });
        }

        $pelamar = $query->get();

        return view('admin.pelamar.kandidat.pelamar', [
            'pelamar' => $pelamar,
            'search' => $request->search ?? ''
        ]);
    }


    public function detailKandidat($id)
    {
        $pelamar = Pelamar::findOrFail($id);
        $logoPath = public_path('images/logoarea.png');
        $logoBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath));
        return view('admin.pelamar.kandidat.detail-data-kandidat', [
            'pelamar' => $pelamar,
            'logoBase64' => $logoBase64,
            'sosmed' => $pelamar->sosmed
        ]);
    }



    //FINANCE
    public function koinHal(Request $request)
    {
        $query = CatatanKoin::query();

        if ($request->filled('no_referensi')) {
            $query->where('no_referensi', $request->no_referensi);
        }

        $koin = $query->get();
        $noReferensiList = catatanKoin::select('no_referensi')->distinct()->pluck('no_referensi');
        return view('admin.finance.finance', [
            'koin' => $koin,
            'noReferensiList' => $noReferensiList,
            'selectedRef' => $request->no_referensi
        ]);
    }

    public function cashHal(Request $request)
    {
        $query = CatatanCash::with('user');

        if ($request->no_referensi) {
            $query->where('no_referensi', $request->no_referensi);
        }

        $cash = $query->orderBy('created_at', 'desc')->get();

        $noReferensiList = CatatanCash::whereNotNull('no_referensi')
            ->distinct()
            ->pluck('no_referensi');

        return view('admin.finance.finance-tunai', [
            'cash' => $cash,
            'noReferensiList' => $noReferensiList,
            'selectedRef' => $request->no_referensi,
        ]);
    }


    public function detail($id)
    {
        $transaksi = CatatanCash::with(['user', 'hargaPembayaran', 'bank'])->findOrFail($id);

        return response()->json([
            'id' => $transaksi->id,
            'user' => [
                'username' => $transaksi->user->username ?? '-',
                'email' => $transaksi->user->email ?? '-',
            ],
            'bank' => [
                'nama_bank' => $transaksi->bank->nama_bank ?? '-',
                'nomor_rekening' => $transaksi->bank->no_rek ?? '-', // disesuaikan dengan field di seeder
            ],
            'sumber_dana' => $transaksi->sumberDana ?? '-', // ambil langsung dari tabel catatan_cashs
            'total' => $transaksi->total ?? 0,
            'harga' => number_format($transaksi->hargaPembayaran->harga ?? 0, 0, ',', '.'),
            'jumlah_koin' => $transaksi->hargaPembayaran->jumlah_koin ?? 0,
            'status' => ucfirst($transaksi->status),
            'created_at' => $transaksi->created_at->format('Y-m-d H:i:s'), // kirim format standar agar JS bisa parse
        ]);
    }


    public function hal_detail()
    {
        $transaksi = CatatanCash::with(['user', 'bank', 'hargaPembayaran'])->latest()->get();
        return view('admin.finance.detail', compact('transaksi'));
    }




    //PERUSAHAAN
    public function halPerusahaan(Request $request)
    {
        $query = Perusahaan::join('users', 'perusahaans.user_id', '=', 'users.id')
            ->select('perusahaans.*', 'users.username');

        // Jika ada input pencarian username
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('users.username', 'like', "%{$search}%")
                    ->orWhere('perusahaans.nama_perusahaan', 'like', "%{$search}%"); // ubah ke nama_pelamar
            });
        }

        $perusahaan = $query->get();
        return view('admin.perusahaan.perusahaan', [
            'perusahaan' => $perusahaan,
            'search' => $request->search ?? ''
        ]);
    }

    public function bekukan(Request $request, $id)
    {
        $request->validate([
            'alasan' => 'required|string|max:255',
        ]);

        if (auth()->id() == $id) {
            return response()->json(['message' => 'Anda tidak dapat membekukan akun sendiri'], 403);
        }

        $user = User::findOrFail($id);

        $user->update([
            'alasan_freeze_akun' => $request->alasan,
            'status' => 1,
        ]);

        return response()->json(['message' => 'Akun berhasil dibekukan']);
    }

    public function aktifkan($id)
    {
        if (auth()->id() == $id) {
            return response()->json(['message' => 'Anda tidak dapat mengubah status akun sendiri'], 403);
        }

        $user = User::findOrFail($id);

        $user->update([
            'alasan_freeze_akun' => null,
            'status' => 0,
        ]);

        return response()->json(['message' => 'Akun berhasil diaktifkan kembali']);
    }

    public function detailPerusahaan($id)
    {
        $perusahaan = Perusahaan::with(['user', 'lowonganPerusahaans'])->findOrFail($id);
        return view('admin.perusahaan.detail-data-perusahaan', [
            'perusahaan' => $perusahaan
        ]);
    }

    public function detailLowongan($id)
    {
        $lowongan = LowonganPerusahaan::with(['perusahaan'])->findOrFail($id);

        return view('admin.perusahaan.view-data-lowongan', [
            'lowongan' => $lowongan
        ]);
    }



    //TALENT HUNTER 
    public function talentHunterForm(Request $request)
    {
        $search = $request->search;

        $talentHunter = TalentHunter::with('perusahaan')
            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    // Search posisi di table talent_hunters
                    $q->where('posisi', 'like', "%{$search}%");

                    // Search nama_perusahaan di table perusahaans (relasi)
                    $q->orWhereHas('perusahaan', function ($p) use ($search) {
                        $p->where('nama_perusahaan', 'like', "%{$search}%");
                    });
                });
            })
            ->get();

        return view('admin.talent-hunter.talenthunter', [
            'talentHunter' => $talentHunter
        ]);
    }


    public function detailTalentHunter($id)
    {
        $talentHunter = TalentHunter::with('perusahaan')->findOrFail($id);
        return view('admin.talent-hunter.detail-data-talent-hunter', [
            'talentHunter' => $talentHunter
        ]);
    }




    //RECRUITMENT
    public function halPerusahaanRecruitment(Request $request)
    {
        $query = Perusahaan::join('users', 'perusahaans.user_id', '=', 'users.id')
            ->select('perusahaans.*', 'users.username');

        // Jika ada input pencarian username
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('users.username', 'like', "%{$search}%")
                    ->orWhere('perusahaans.nama_perusahaan', 'like', "%{$search}%"); // ubah ke nama_pelamar
            });
        }

        $perusahaan = $query->get();
        return view('admin.recruitment.perusahaan', [
            'perusahaan' => $perusahaan,
            'search' => $request->search ?? ''
        ]);
    }


    //hal rec
    public function recruitment(Request $request, $id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $search = $request->search;

        $recruitments = PembeliKandidat::where('status', 'diterima')
            ->whereHas('lowonganPerusahaan', function ($q) use ($id) {
                $q->where('perusahaan_id', $id);
            })
            ->when($search, function ($q) use ($search) {

                $q->where(function ($query) use ($search) {
                    // Search username (table users)
                    $query->whereHas('pelamar.user', function ($u) use ($search) {
                        $u->where('username', 'like', "%$search%");
                    });

                    // Search nama pelamar (table pelamars)
                    $query->orWhereHas('pelamar', function ($p) use ($search) {
                        $p->where('nama_pelamar', 'like', "%$search%");
                    });

                    // Search nama lowongan_perusahaans
                    $query->orWhereHas('lowonganPerusahaan', function ($l) use ($search) {
                        $l->where('nama', 'like', "%$search%");
                    });
                });
            })
            ->with(['pelamar.user', 'lowonganPerusahaan'])
            ->get();

        return view('admin.recruitment.recruitment', [
            'perusahaan' => $perusahaan,
            'recruitments' => $recruitments,
        ]);
    }


    public function detailRecruitment($id)
    {
        $recruitment = PembeliKandidat::with([
            'pelamar.user',
            'pelamar.sosmed',
            'pelamar.pengalaman_organisasi',
            'pelamar.pengalaman_kerja',
            'pelamar.riwayat_pendidikan',
            'pelamar.alamat_pelamar',
            'pelamar.skill',
            'lowonganPerusahaan.perusahaan.alamatUtama',
            'lowonganPerusahaan.perusahaan'
        ])->findOrFail($id);

        return view('admin.recruitment.detail-recruitment', [
            'recruitment' => $recruitment
        ]);
    }


    public function destroyRecruitment($id)
    {
        //Ambil data pembelian kandidat 
        $pembelian = PembeliKandidat::with([
            'pelamar.user',
            'lowonganPerusahaan.perusahaan'
        ])->findOrFail($id);

        $user = $pembelian->pelamar->user;
        $perusahaan = $pembelian->lowonganPerusahaan->perusahaan ?? null;
        $perusahaanUser = $perusahaan->user ?? null;

        //hapus pembelian kandidat
        $pembelian->delete();

        //kirim notifikasi ke pelamar
        Notifikasi::create([
            'user_id' => $user->id,
            'perusahaan_id' => $perusahaan->id,
            'judul' => 'Status Recruitment Dibatalkan',
            'pesan' => 'Status Recruitment Anda telah dibatalkan oleh Admin.',
        ]);

        if ($perusahaanUser) {
            //kirim notifikasi ke perusahaan
            Notifikasi::create([
                'user_id' => $perusahaan->user->id,
                // 'perusahaan_id' => $perusahaan->id,
                'judul' => 'Status Recruitment Dibatalkan',
                'pesan' => 'Kandidat' . $pembelian->pelamar->nama_pelamar .  'telah dihapus dari daftar recruitment oleh Admin.',
            ]);
        }

        return redirect()->route('admin.recruitment', $perusahaan->id)->with('success', 'Recruitment berhasil dihapus & pelamar kembali menjadi kandidat biasa.');
    }




    //FILTER PROVINSI
    public function pilihProvinsi()
    {
        $provinsis = Provinsi::orderBy('nama')->get();

        return view('dashboard.pilih-provinsi', [
            'provinsis' => $provinsis,
            'selected' => session('provinsi_id')
        ]);
    }


    public function setProvinsi(Request $request)
    {
        $request->validate([
            'provinsi_id' => 'required|exists:provinsis,id'
        ]);

        session(['provinsi_id' => $request->provinsi_id]);

        return redirect()->route('admin.dashboard')->with('success', 'Provinsi berhasil diubah!');
    }
}
