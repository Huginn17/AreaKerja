<?php

namespace App\Http\Controllers;

use App\Models\Admin;
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
}
