<?php

namespace App\Http\Controllers;

use App\Models\AlamatPerusahaan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
}
