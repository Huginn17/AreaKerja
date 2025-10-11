<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\CatatanCash;
use App\Models\CatatanKoin;
use App\Models\Pelamar;
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
        return view(
            'admin.profile.edit-profile',
            ["data" => $admin]
        );
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
            "provinsi"      => 'nullable|string',
            "kota"          => 'nullable|string',
            "kecamatan"     => 'nullable|string',
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
    public function halCalonKandidat()
    {
        $pelamar = Pelamar::where('kategori', 'calon kandidat')->get();
        return view('admin.pelamar.calon_kandidat.calon-kandidat', [
            'pelamar' => $pelamar
        ]);
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
    public function halNonKandidat()
    {
        $pelamar = Pelamar::where('kategori', 'pelamar')->get();
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
    public function halKandidat()
    {
        $pelamar = Pelamar::where('kategori', 'kandidat aktif')->get();
        return view('admin.pelamar.kandidat.pelamar', [
            'pelamar' => $pelamar
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

        $query = CatatanCash::query();


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
        return view('admin.finance.detail', compact('transaksi'));
    }
}
