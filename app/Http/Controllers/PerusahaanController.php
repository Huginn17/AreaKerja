<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PerusahaanController extends Controller
{
    public function update_profile(Request $request, Perusahaan $perusahaan)
    {
        if ($request->hasFile('img_profile')) {
            // Hapus foto lama jika ada
            if ($perusahaan->img_profile && Storage::exists('public/' . $perusahaan->img_profile)) {
                Storage::delete('public/' . $perusahaan->img_profile);
            }
            // Simpan foto baru
            $validated['img_profile'] = $request->file('img_profile')->store('images', 'public');
        }

        $validated = $request->validate([
            "nama_perusahaan"    =>      "nullable",
            "img_profile"     =>      "nullable|file|image",
            "jenis_perusahaan" =>      "nullable",
            "deskripsi"  =>     "nullable",
            "visi"   =>      "nullable",
            "misi"    =>     "nullable",

        ]);

        // if ($request->hasFile('img_profile')) {
        //     $validated['img_profile'] = $request->file('img_profile')->store('images', 'public');
        // }

        $validated['user_id'] = Auth::user()->id;
        $perusahaan->update($validated);

        $sosmed = $request->validate([
            "instagram" => "nullable",
            "linkedin" => "nullable",
            "website" => "nullable",
            "twitter" => "nullable",
        ]);

        $perusahaan->sosmed()->create($sosmed);
        return redirect()->route('profile.index')->with('success', 'Profile berhasil diupdate');
    }
    public function destroy_profile(Perusahaan $perusahaan)
    {
        if ($perusahaan->img_profile && Storage::exists('public/' . $perusahaan->img_profile)) {
            Storage::delete('public/' . $perusahaan->img_profile);
        }

        $perusahaan->img_profile = null;
        $perusahaan->save();
        return redirect()->route('profile.index')->with('success', 'Profile berhasil dihapus');
    }
}
