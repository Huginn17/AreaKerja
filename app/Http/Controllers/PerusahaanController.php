<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Event;
use App\Models\Skill;
use App\Models\Pelamar;
use App\Models\Provinsi;
use App\Models\Kecamatan;
use App\Models\DaftarBank;
use App\Models\Perusahaan;
use App\Models\CatatanCash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\HargaPembayaran;
use App\Models\PelamarLowongan;
use App\Models\AlamatPerusahaan;
use App\Models\CatatanKoin;
use App\Models\LowonganPerusahaan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PerusahaanController extends Controller
{

    public function profile_perusahaan()
    {
        return view('perusahaan.profile.profile-perusahaan');
    }

    public function edit_profile()
    {
        return view('perusahaan.profile.edit');
    }

    public function update_profile_perusahaan(Request $request, Perusahaan $perusahaan)
    {
        $validated = $request->validate([
            'nama_perusahaan'     => "nullable|string",
            'jenis_perusahaan'    => "nullable|string",
            'website_perusahaan'  => "nullable|string",
            'telepon_perusahaan'  => "nullable|string",
            'whatsapp'            => "nullable|string",
            'legalitas'           => "nullable|string",
            'deskripsi'           => "nullable|string",
            'visi'                => "nullable|string",
            'misi'                => "nullable|string",
            'img_profile'         => "nullable|image|mimes:jpg,jpeg,png|max:2048",
        ]);

        if ($request->hasFile('img_profile')) {
            // Hapus foto lama jika ada
            if ($perusahaan->img_profile && Storage::exists('public/' . $perusahaan->img_profile)) {
                Storage::delete('public/' . $perusahaan->img_profile);
            }

            // Simpan foto baru ke storage/app/public/images
            $validated['img_profile'] = $request->file('img_profile')->store('images', 'public');
        }

        $perusahaan->update($validated);

        return redirect()->route('profile.perusahaan')
            ->with('success', 'Profile berhasil diupdate');
    }



    public function destroy_profile(Perusahaan $perusahaan)
    {
        if ($perusahaan->img_profile && Storage::exists('public/' . $perusahaan->img_profile)) {
            Storage::delete('public/' . $perusahaan->img_profile);
        }

        $perusahaan->img_profile = null;
        $perusahaan->save();
        return redirect()->route('profile.perusahaan')->with('success', 'Profile berhasil dihapus');
    }



    //ALAMAT PERUSAHAAN
    public function alamat_perusahaan()
    {
        return view('perusahaan.alamat.alamat');
    }

    public function form_alamat()
    {
        $provinsis = Provinsi::all();
        return view('perusahaan.alamat.buat-alamat', [
            'provinsis' => $provinsis
        ]);
    }

    public function getKota($provinsi_id)
    {
        return response()->json(Kota::where('provinsi_id', $provinsi_id)->get());
    }

    public function getKecamatan($kota_id)
    {
        return response()->json(Kecamatan::where('kota_id', $kota_id)->get());
    }


    public function store_alamat(Request $request)
    {
        $validated = $request->validate([
            'label'        => 'nullable|string|max:255',
            'desa'         => 'nullable|string|max:255',
            'provinsi_id'  => 'nullable|exists:provinsis,id',
            'kota_id'      => 'nullable|exists:kotas,id',
            'kecamatan_id' => 'nullable|exists:kecamatans,id',
            'kode_pos'     => 'nullable|string|max:10',
            'detail'       => 'nullable|string|max:500',
        ]);

        $validated['perusahaan_id'] = Auth::user()->perusahaan->id;
        AlamatPerusahaan::create($validated);
        return redirect()->route('alamat.perusahaan')->with('success', 'Alamat berhasil disimpan');
    }

    public function edit_alamat(AlamatPerusahaan $alamatperusahaan)
    {
        $provinsis = Provinsi::all();
        return view('perusahaan.alamat.edit', [
            "data" => $alamatperusahaan,
            'provinsis' => $provinsis
        ]);
    }

    public function update_alamat(Request $request, AlamatPerusahaan $alamatperusahaan)
    {
        $validated = $request->validate([
            'label'        => 'nullable|string|max:255',
            'desa'         => 'nullable|string|max:255',
            'provinsi_id'  => 'nullable|exists:provinsis,id',
            'kota_id'      => 'nullable|exists:kotas,id',
            'kecamatan_id' => 'nullable|exists:kecamatans,id',
            'kode_pos'     => 'nullable|string|max:10',
            'detail'       => 'nullable|string|max:500',
        ]);

        $validated['perusahaan_id'] = Auth::user()->perusahaan->id;

        $alamatperusahaan->update($validated);
        return redirect()->route('alamat.perusahaan')->with('success', 'Alamat berhasil diupdate');
    }

    public function destroy_alamat(AlamatPerusahaan $alamatperusahaan)
    {
        $alamatperusahaan->delete();
        return redirect()->route('alamat.perusahaan')->with('success', 'Alamat berhasil dihapus');
    }

    // public function detail_transaksi_coin($id)
    // {
    //     $transaksi = CatatanCash::findOrFail($id);
    //     return view('perusahaan.transaksi-koin', compact('transaksi'));
    // }


    //PELAMAR
    public function pelamar(LowonganPerusahaan $lowongan)
    {
        $lowongan->load('pelamar');
        return view('perusahaan.pelamar.pelamar', [
            "data" => $lowongan,
            "woi" => PelamarLowongan::all(),
            "exp" => PelamarLowongan::where('lowongan_id', $lowongan->id)->get()
        ]);
    }


    //PENGATURAN 
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:3',
        ]);

        $user = $request->user();

        //cek pw lama
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'Password lama salah');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password berhasil diubah');
    }



    //KANDIDAT AK
    public function kandidat_ak(Request $request)
    {
        // Data dasar
        $perusahaan = auth()->user()->perusahaan;
        $skills = Skill::select('skill')->distinct()->pluck('skill');

        // cari umur termuda - tertua
        $minAge = Pelamar::selectRaw('MIN(TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE())) as min_age')->value('min_age');
        $maxAge = Pelamar::selectRaw('MAX(TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE())) as max_age')->value('max_age');

        $umurRange = [];
        $step = 5;

        for ($i = $minAge; $i <= $maxAge; $i += $step) {
            $end = $i + $step;
            $umurRange[] = "$i-$end";
        }

        $genders = ['L', 'P'];

        // query utama hanya untuk kategori kandidat aktif
        $query = Pelamar::where('kategori', 'kandidat aktif');

        // filter skill (relasi ke tabel skill)
        if ($request->filled('skill')) {
            $query->whereHas('skill', function ($q) use ($request) {
                $q->where('skill', $request->skill);
            });
        }

        // filter umur
        if ($request->filled('umur')) {
            [$min, $max] = explode('-', $request->umur);
            $query->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN ? AND ?', [$min, $max]);
        }

        // filter gender
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        $pelamars = $query->get();

        return view('perusahaan.kandidat-areakerja', [
            'hargaPembayarans' => HargaPembayaran::all(),
            'daftarBank' => DaftarBank::all(),
            'skills' => $skills,
            'umurRange' => $umurRange,
            'genders' => $genders,
            'pelamars' => $pelamars,
            'perusahaan' => $perusahaan
        ]);
    }




    //EVENT
    public function event()
    {
        $events = Event::latest()->get();
        return view('perusahaan.event.event', [
            'events' => $events
        ]);
    }

    public function detail($id)
    {
        $event = Event::with('kegiatan')->findOrFail($id);
        return view('perusahaan.event.gabung-event', [
            'event' => $event
        ]);
    }




    //BERLANGGANAN
    public function halLangganan()
    {
        $user = auth()->user();
        $perusahaan = Perusahaan::where('user_id', $user->id)->first();

        if (!$perusahaan) {
            abort(404, 'Data perusahaan tidak ditemukan.');
        }

        if ($perusahaan->is_berlangganan == 1 && \Carbon\Carbon::now()->lt($perusahaan->tanggal_expired)) {
            return view('perusahaan.langganan.dah_langganan', [
                'perusahaan' => $perusahaan
            ]);
        }

        return view('perusahaan.langganan.berlangganan', [
            'perusahaan' => $perusahaan,
            'hargaPembayarans' => HargaPembayaran::all(),
            'daftarBank' => DaftarBank::all(),
        ]);
    }

    public function storeLangganan(Request $request)
    {
        $user = Auth::user();
        $perusahaan = Perusahaan::where('user_id', $user->id)->first();

        if ($perusahaan->koin_perusahaan < 1000) {
            return response()->json([
                'success' => false,
                'message' => 'Koin tidak cukup untuk berlangganan.'
            ], 400);
        }

        $perusahaan->koin_perusahaan -= 1000;
        $perusahaan->is_berlangganan = 1;
        $perusahaan->tanggal_berlangganan = Carbon::now();
        $perusahaan->tanggal_expired = Carbon::now()->addYear();
        $perusahaan->save();

        CatatanKoin::create([
            'user_id' => $user->id,
            'no_referensi' => 'SUB-' . strtoupper(Str::random(8)),
            'pesanan' => 'Berlangganan Tahunan',
            'dari' => 'Saldo Koin',
            'sumber_dana' => 'Pembayaran Langganan',
            'total' => '-1000',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Berlangganan berhasil! Terima kasih telah berlangganan.'
        ]);
    }

    public function kirimEmail()
    {
        $user = auth()->user();
        $perusahaan = $user->perusahaan;
        $admineEmail = env('ADMIN_EMAIL', 'admin@silohugra.com');

        $data = [
            'nama_perusahaan' => $perusahaan->nama_perusahaan,
            'email_perusahaan' => $user->email,
            'tanggal' => now()->translatedFormat('d F Y'),
            'jumlah' => '1.000 Koin',
            'expired' => optional($perusahaan->tanggal_expired)->translatedFormat('d F Y'),
        ];

        Mail::send('emails.langganan_sukses_admin', $data, function ($message) use ($data, $admineEmail) {
            $message->to($admineEmail)
                ->subject('Pemberitahuan Pembayaran Langganan - Areakerja.com');
        });

        return response()->json([
            'success' => true
        ]);
    }

    public function halDaftarPekerja()
    {
        $user = auth()->user();
        $perusahaan = Perusahaan::where('user_id', $user->id)->first();
        return view('perusahaan.langganan.request-data',[
            'perusahaan' => $perusahaan
        ]);
    }
}
