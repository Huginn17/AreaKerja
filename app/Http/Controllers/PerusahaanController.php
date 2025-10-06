<?php

namespace App\Http\Controllers;

use App\Models\AlamatPerusahaan;
use App\Models\CatatanCash;
use App\Models\Event;
use App\Models\LowonganPerusahaan;
use App\Models\Pelamar;
use App\Models\PelamarLowongan;
use App\Models\Perusahaan;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        return view('perusahaan.alamat.buat-alamat');
    }

    public function store_alamat(Request $request)
    {
        $validated = $request->validate([
            'label'  => 'nullable',
            'desa'   => 'nullable',
            'kecamatan' => 'nullable',
            'kota'  =>  'nullable',
            'provinsi' => 'nullable',
            'kode_pos' => 'nullable',
            'detail' =>   'nullable'
        ]);

        $validated['perusahaan_id'] = Auth::user()->perusahaan->id;
        AlamatPerusahaan::create($validated);
        return redirect()->route('alamat.perusahaan')->with('success', 'Alamat berhasil disimpan');
    }

    public function edit_alamat(AlamatPerusahaan $alamatperusahaan)
    {
        return view('perusahaan.alamat.edit', [
            "data" => $alamatperusahaan
        ]);
    }

    public function update_alamat(Request $request, AlamatPerusahaan $alamatperusahaan)
    {
        $validated = $request->validate([
            'label'  => 'nullable',
            'desa'   => 'nullable',
            'kecamatan' => 'nullable',
            'kota'  =>  'nullable',
            'provinsi' => 'nullable',
            'kode_pos' => 'nullable',
            'detail' =>   'nullable'
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
        return view('perusahaan.event.event',[
            'events' => $events
        ]);
    }

    public function detail($id)
    {
        $event = Event::with('kegiatan')->findOrFail($id);
        return view('perusahaan.event.gabung-event',[
            'event' => $event
        ]);
    }


}
