<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Finance;
use App\Models\Pelamar;
use App\Models\SuperAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('super_admin.dashboard');
    }


    //PROFILE
    public function profile_superadmin()
    {
        return view('super_admin.profile.profile-superadmin');
    }
    public function edit_profile(SuperAdmin $superadmin)
    {
        return view(
            'super_admin.profile.edit-profile-superadmin',
            [
                "data" => $superadmin
            ]
        );
    }
    public function update_profile_superadmin(Request $request, SuperAdmin $superadmin)
    {

        $validated = $request->validate([
            'username'     => "nullable|string",
            'email'    => "nullable|email",

        ]);

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

        $user = User::where('id', Auth::user()->id);
        if ($user) {
            $user->update($validated);
        }

        $superadmin = SuperAdmin::where('id', Auth::user()->id)->first();

        if ($request->hasFile('img_profile')) {
            // Hapus foto lama jika ada
            if ($superadmin->img_profile && Storage::exists('public/' . $superadmin->img_profile)) {
                Storage::delete('public/' . $superadmin->img_profile);
            }

            // Simpan foto baru ke storage/app/public/images
            $valid['img_profile'] = $request->file('img_profile')->store('images', 'public');
        }

        if ($superadmin) {
            $superadmin->update($valid);
        }

        return redirect()->route('superadmin.profile')->with('success', 'Profile updated successfully.');
    }


    public function destroy_profile(SuperAdmin $superadmin)
    {
        if ($superadmin->img_profile && Storage::exists('public/' . $superadmin->img_profile)) {
            Storage::delete('public/' . $superadmin->img_profile);
        }

        $superadmin->img_profile = null;
        $superadmin->save();
        return redirect()->route('superadmin.edit.profile')->with('success', 'Profile berhasil dihapus');
    }


    //AKUN FREEZE
    public function freezeForm()
    {
        return view('super_admin.freeze.freeze', [
            "data" => User::all()
        ]);
    }

    public function ban(Request $request, User $user)
    {
        // dd($request->all());
        $data = $request->validate([
            'status' => 'required|boolean'
        ]);
        $user->update($data);
        return redirect()->route('superadmin.freeze')->with('success', 'Akun berhasil di freeze');
    }

    public function unban(Request $request, User $user)
    {
        $data = $request->validate([
            'status' => 'required|boolean'
        ]);
        $user->update($data);
        return redirect()->route('superadmin.freeze')->with('success', 'Akun berhasil di unfreeze');
    }

    public function delete_akun(User $user)
    {
        $user->delete($user->id);
        return redirect()->route('superadmin.freeze')->with('success', 'Akun berhasil dihapus');
    }

    public function detail_freeze(User $user)
    {
        return view('super_admin.freeze.detail-freeze', [
            "data" => $user
        ]);
    }


    public function pelamarhal()
    {
        $pelamar = Pelamar::all();
        return view(
            'super_admin.pelamar.data-pelamar',
            [
                "pelamar" => $pelamar
            ]
        );
    }

    //NON KANDIDAT
    public function detail_non_kandidat(Pelamar $pelamar)
    {
        $logoPath = public_path('images/logoarea.png');
        $logoBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath));
        return view('super_admin.pelamar.non-kandidat.detail', [
            "data" => $pelamar,
            "logoBase64" => $logoBase64,
            "sosmed" => $pelamar->sosmed,
        ]);
    }

    public function edit_non_kandidat(Pelamar $pelamar)
    {
        return view('super_admin.pelamar.non-kandidat.edit', [
            "data" => $pelamar
        ]);
    }



    //CV
    public function cv(Pelamar $pelamar)
    {
        return view('super_admin.pelamar.cv', [
            "data" => $pelamar
        ]);
    }




    //  CRUD ROLE
    public function role()
    {
        $users = User::whereIn('role', ['admin', 'finance'])->with(['admin', 'finance'])->get();
        return view('super_admin.add.add-user', [
            'users' => $users
        ]);
    }

    public function createForm()
    {
        return view('super_admin.add.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email'        => 'required|email|unique:users',
            'username'     => 'required|unique:users',
            'nama_lengkap' => 'required',
            'role'         => 'required|in:admin,finance',
            'password'     => 'required',
            'img_profile'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = User::create([
            'email'    => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        $valid = $request->only([
            'nama_lengkap',
            'provinsi',
            'kota',
            'kecamatan',
            'kode_pos',
            'detail_alamat'
        ]);

        if ($request->hasFile('img_profile')) {
            $valid['img_profile'] = $request->file('img_profile')->store('images', 'public');
        }

        if ($request->role === 'admin') {
            $valid['user_id'] = $user->id;
            // dd($valid);
            Admin::create($valid);
        } elseif ($request->role === 'finance') {
            $valid['user_id'] = $user->id;
            Finance::create($valid);
        };

        return redirect()->route('superadmin.add.user')->with('success', 'Data User Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $user = User::with(['admin', 'finance'])->findOrFail($id);
        return view('super_admin.add.edit-addprofile', [
            "user" => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::with(['admin', 'finance'])->findOrFail($id);


        $request->validate([
            'email'        => 'required|email|unique:users,email,' . $user->id,
            // 'username'     => 'required|unique:users,username,' . $user->id,
            'nama_lengkap' => 'required',
            'role'         => 'required|in:admin,finance',
            'img_profile'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user->update([
            'email'    => $request->email,
            // 'username' => $request->username,
            'role'     => $request->role
        ]);

        $valid = $request->only([
            'nama_lengkap',
            'provinsi',
            'kota',
            'kecamatan',
            'desa',
            'kode_pos',
            'detail_alamat'
        ]);

        if ($request->hasFile('img_profile')) {
            // Hapus foto lama
            if ($user->role === 'admin' && $user->admin && $user->admin->img_profile) {
                Storage::delete('public/' . $user->admin->img_profile);
            }
            if ($user->role === 'finance' && $user->finance && $user->finance->img_profile) {
                Storage::delete('public/' . $user->finance->img_profile);
            }

            // Simpan foto baru
            $valid['img_profile'] = $request->file('img_profile')->store('images', 'public');
        }

        if ($user->role === 'admin') {
            if ($user->finance) $user->finance->delete();

            // ambil img lama jika tidak ada upload baru
            if (!$request->hasFile('img_profile') && $user->admin) {
                $valid['img_profile'] = $user->admin->img_profile;
            }

            $user->admin()->updateOrCreate(['user_id' => $user->id], $valid);
        } elseif ($user->role === 'finance') {
            if ($user->admin) $user->admin->delete();

            if (!$request->hasFile('img_profile') && $user->finance) {
                $valid['img_profile'] = $user->finance->img_profile;
            }

            $user->finance()->updateOrCreate(['user_id' => $user->id], $valid);
        }


        return redirect()->route('superadmin.add.user')->with('success', 'Data Berhasil Disimpan');
    }

    public function detail($id)
    {
         $user = User::with(['admin', 'finance'])->findOrFail($id);

        return view('super_admin.add.detail', [
           'user' => $user
        ]);
    }

    public function hapus($id)
    {
        $user = User::with(['admin', 'finance'])->findOrFail($id);

        if ($user->role === 'admin' && $user->admin && $user->admin->img_profile) {
            Storage::delete('public/' . $user->admin->img_profile);
        }
        if ($user->role === 'finance' && $user->finance && $user->finance->img_profile) {
            Storage::delete('public/' . $user->finance->img_profile);
        }

        if ($user->role === 'admin' && $user->admin) {
            $user->admin->delete();
        }
        if ($user->role === 'finance' && $user->finance) {
            $user->finance->delete();
        }

        $user->delete();

        return redirect()->route('superadmin.add.user')->with('success', 'Data User Berhasil Dihapus');
    }
}
