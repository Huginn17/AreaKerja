<?php

namespace App\Http\Controllers;

use App\Models\AlamatPelamar;
use App\Models\Pelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $pelamar = Pelamar::where('user_id', $user->id)
            ->with('pengalaman_organisasi')
            ->first();

        return view('non-user.profile.profile', compact('pelamar'));
    }

    public function update_profile(Request $request, Pelamar $pelamar)
    {
        if ($request->hasFile('img_profile')) {
            // Hapus foto lama jika ada
            if ($pelamar->img_profile && Storage::exists('public/' . $pelamar->img_profile)) {
                Storage::delete('public/' . $pelamar->img_profile);
            }
            // Simpan foto baru
            $validated['img_profile'] = $request->file('img_profile')->store('images', 'public');
        }




        $validated = $request->validate([
            "nama_pelamar"    =>      "nullable",
            "img_profile"     =>      "nullable|file|image",
            "gender"          =>      "nullable",
            "tanggal_lahir"   =>      "nullable",
            "deskripsi_diri"  =>     "nullable",
            "gaji_minimal"    =>     "nullable",
            "gaji_maksimal"    =>     "nullable"
        ]);

        // if ($request->hasFile('img_profile')) {
        //     $validated['img_profile'] = $request->file('img_profile')->store('images', 'public');
        // }

        $validated['user_id'] = Auth::user()->id;
        $pelamar->update($validated);

        $sosmed = $request->validate([
            "instagram" => "nullable",
            "linkedin" => "nullable",
            "website" => "nullable",
            "twitter" => "nullable",
        ]);

        $pelamar->sosmed()->create($sosmed);
        return redirect()->route('profile.index')->with('success', 'Profile berhasil diupdate');
    }
    public function destroy_profile(Pelamar $pelamar)
    {
        if ($pelamar->img_profile && Storage::exists('public/' . $pelamar->img_profile)) {
            Storage::delete('public/' . $pelamar->img_profile);
        }

        $pelamar->img_profile = null;
        $pelamar->save();
        return redirect()->route('profile.index')->with('success', 'Profile berhasil dihapus');
    }


    public function alamat()
    {
        return view('non-user.alamat.index');
    }

    public function form_alamat()
    {
        return view('non-user.alamat.create-alamat');
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

        $validated['pelamar_id'] = Auth::user()->pelamar->id;
        AlamatPelamar::create($validated);
        return redirect()->route('alamat')->with('success', 'Alamat berhasil disimpan');
    }

    public function edit_alamat(AlamatPelamar $alamatpelamar)
    {
        return view('non-user.alamat.edit', ["data" => $alamatpelamar]);
    }
    public function update_alamat(Request $request, AlamatPelamar $alamatpelamar)
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

        $validated['pelamar_id'] = Auth::user()->pelamar->id;
        $alamatpelamar->update($validated);
        return redirect()->route('alamat')->with('success', 'Alamat berhasil diupdate');
    }

    public function destroy_alamat(AlamatPelamar $alamatpelamar)
    {
        $alamatpelamar->delete();
        return redirect()->route('alamat')->with('success', 'Alamat berhasil dihapus');
    }
}
