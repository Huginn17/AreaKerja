<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Finance;
use App\Models\Pelamar;
use App\Models\Perusahaan;
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
        $kandidat = Pelamar::where('kategori', 'kandidat aktif')->get();
        $nonKandidat = Pelamar::where('kategori', 'pelamar')->get();
        $calonKandidat = Pelamar::where('kategori', 'calon kandidat')->get();

        return view('super_admin.pelamar.data-pelamar', [
            'kandidat' => $kandidat,
            'nonKandidat' => $nonKandidat,
            'calonKandidat' => $calonKandidat,
        ]);
    }

    //KANDIDAT
    public function detail_kandidat(Pelamar $pelamar)
    {
        $logoPath = public_path('images/logoarea.png');
        $logoBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath));
        return view('super_admin.pelamar.kandidat.detail', [
            "data" => $pelamar,
            "logoBase64" => $logoBase64,
            "sosmed" => $pelamar->sosmed,
        ]);
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

    //CALON KANDIDAT
    public function detailCalonKandidat($id)
    {
        $pelamar = Pelamar::findOrFail($id);
        return view('super_admin.pelamar.calon-kandidat.detail', [
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

        return redirect()->route('superadmin.pelamar')->with('success', 'Kandidat berhasil diluluskan.');
    }

    public function gugur($id)
    {
        $pelamar = Pelamar::findOrFail($id);
        $pelamar->kategori = 'pelamar';
        $pelamar->save();

        return redirect()->route('superadmin.pelamar')->with('success', 'Kandidat dinyatakan gugur.');
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
        $usersAdminFinance = User::whereIn('role', ['admin', 'finance'])
            ->with(['admin', 'finance'])
            ->get();

        $usersPerusahaanPelamar = User::whereIn('role', ['perusahaan', 'pelamar'])
            ->with(['perusahaan', 'pelamar'])
            ->get();

        return view('super_admin.add.add-user', [
            'usersAdminFinance' => $usersAdminFinance,
            'usersPerusahaanPelamar' => $usersPerusahaanPelamar
        ]);
    }

    public function createForm()
    {
        return view('super_admin.add.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'email'        => 'required|email|unique:users',
            'username'     => 'required|unique:users',
            'role'         => 'required|in:admin,finance,perusahaan',
            'password'     => 'required',
            'img_profile'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];

        if (in_array($request->role, ['admin', 'finance'])) {
            $rules['nama_lengkap'] = 'required';
        }

        $request->validate($rules);

        $user = User::create([
            'email'    => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        // $valid = $request->only([
        //     'nama_lengkap',
        //     'provinsi',
        //     'kota',
        //     'kecamatan',
        //     'kode_pos',
        //     'detail_alamat'
        // ]);

        $imgPath = null;
        if ($request->hasFile('img_profile')) {
            $imgPath = $request->file('img_profile')->store('images', 'public');
        }

        // if ($request->role === 'admin') {
        //     $valid['user_id'] = $user->id;
        //     // dd($valid);
        //     Admin::create($valid);
        // } elseif ($request->role === 'finance') {
        //     $valid['user_id'] = $user->id;
        //     Finance::create($valid);
        // };  

        switch ($request->role) {
            case 'admin':
                Admin::create([
                    'user_id'       => $user->id,
                    'nama_lengkap'  => $request->nama_lengkap,
                    'provinsi'      => $request->provinsi,
                    'kota'          => $request->kota,
                    'kecamatan'     => $request->kecamatan,
                    'kode_pos'      => $request->kode_pos,
                    'detail_alamat' => $request->detail_alamat,
                    'img_profile'   => $imgPath,
                ]);
                break;

            case 'finance':
                Finance::create([
                    'user_id'       => $user->id,
                    'nama_lengkap'  => $request->nama_lengkap,
                    'provinsi'      => $request->provinsi,
                    'kota'          => $request->kota,
                    'kecamatan'     => $request->kecamatan,
                    'kode_pos'      => $request->kode_pos,
                    'detail_alamat' => $request->detail_alamat,
                    'img_profile'   => $imgPath,
                ]);
                break;

            case 'perusahaan':
                Perusahaan::create([
                    'user_id'           => $user->id,
                    'nama_perusahaan'   => $request->nama_perusahaan,
                    'jenis_perusahaan'  => $request->jenis_perusahaan,
                    'website_perusahaan' => $request->website_perusahaan,
                    'telepon_perusahaan' => $request->telepon_perusahaan,
                    'whatsapp'          => $request->whatsapp,
                    'legalitas'         => $request->legalitas,
                    'deskripsi'         => $request->deskripsi,
                    'visi'              => $request->visi,
                    'misi'              => $request->misi,
                    'img_profile'       => $imgPath,
                ]);
                break;
        }

        return redirect()->route('superadmin.add.user')->with('success', 'Data Berhasil Ditambahkan');
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
        $user = User::findOrFail($id);

        $rules = [
            'email'        => 'required|email|unique:users,email,' . $user->id,
            'username'     => 'required|unique:users,username,' . $user->id,
            'role'         => 'required|in:admin,finance,perusahaan,pelamar',
            'img_profile'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];

        if (in_array($request->role, ['admin', 'finance'])) {
            $rules['nama_lengkap'] = 'required';
        }

        $request->validate($rules);

        // Update data utama user
        $user->update([
            'email'    => $request->email,
            'username' => $request->username,
            'role'     => $request->role,
            'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
        ]);

        // Ambil foto lama dari relasi aktif
        $imgPath = null;
        switch ($user->role) {
            case 'admin':
                $imgPath = $user->admin->img_profile ?? null;
                break;
            case 'finance':
                $imgPath = $user->finance->img_profile ?? null;
                break;
            case 'perusahaan':
                $imgPath = $user->perusahaan->img_profile ?? null;
                break;
            case 'pelamar':
                $imgPath = $user->pelamar->img_profile ?? null;
                break;
        }

        // Jika upload baru, hapus foto lama dan simpan yang baru
        if ($request->hasFile('img_profile')) {
            if ($imgPath) Storage::delete('public/' . $imgPath);
            $imgPath = $request->file('img_profile')->store('images', 'public');
        }


        // Update atau buat data relasi berdasarkan role
        switch ($request->role) {
            case 'admin':
                $user->admin()->updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'nama_lengkap'  => $request->nama_lengkap,
                        'provinsi'      => $request->provinsi,
                        'kota'          => $request->kota,
                        'kecamatan'     => $request->kecamatan,
                        'kode_pos'      => $request->kode_pos,
                        'detail_alamat' => $request->detail_alamat,
                        'img_profile'   => $imgPath,
                    ]
                );
                break;

            case 'finance':
                $user->finance()->updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'nama_lengkap'  => $request->nama_lengkap,
                        'provinsi'      => $request->provinsi,
                        'kota'          => $request->kota,
                        'kecamatan'     => $request->kecamatan,
                        'kode_pos'      => $request->kode_pos,
                        'desa'           => $request->desa,
                        'detail_alamat' => $request->detail_alamat,
                        'img_profile'   => $imgPath,
                    ]
                );
                break;

            case 'perusahaan':
                $user->perusahaan()->updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'nama_perusahaan'   => $request->nama_perusahaan,
                        'jenis_perusahaan'  => $request->jenis_perusahaan,
                        'website_perusahaan' => $request->website_perusahaan,
                        'telepon_perusahaan' => $request->telepon_perusahaan,
                        'whatsapp'          => $request->whatsapp,
                        'legalitas'         => $request->legalitas,
                        'deskripsi'         => $request->deskripsi,
                        'visi'              => $request->visi,
                        'misi'              => $request->misi,
                        'img_profile'       => $imgPath,

                    ]
                );
                break;

            case 'pelamar':
                $user->pelamar()->updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'nama_lengkap'  => $request->nama_lengkap,
                        'telepon'       => $request->telepon,
                        'pendidikan'    => $request->pendidikan,
                        'provinsi'      => $request->provinsi,
                        'kota'          => $request->kota,
                        'kecamatan'     => $request->kecamatan,
                        'kode_pos'      => $request->kode_pos,
                        'detail_alamat' => $request->detail_alamat,
                        'img_profile'   => $imgPath,
                    ]
                );
                break;
        }

        return redirect()->route('superadmin.add.user')->with('success', 'Data Berhasil Disimpan');
    }


    public function detail($id)
    {
        $user = User::with(['admin', 'finance', 'perusahaan', 'pelamar'])->findOrFail($id);

        return view('super_admin.add.detail', [
            'user' => $user
        ]);
    }

    public function hapus($id)
    {
        $user = User::with(['admin', 'finance', 'perusahaan', 'pelamar'])->findOrFail($id);

        // 🔹 Hapus gambar profil sesuai role
        if ($user->role === 'admin' && $user->admin?->img_profile) {
            Storage::delete('public/' . $user->admin->img_profile);
        } elseif ($user->role === 'finance' && $user->finance?->img_profile) {
            Storage::delete('public/' . $user->finance->img_profile);
        } elseif ($user->role === 'perusahaan' && $user->perusahaan?->img_profile) {
            Storage::delete('public/' . $user->perusahaan->img_profile);
        } elseif ($user->role === 'pelamar' && $user->pelamar?->img_profile) {
            Storage::delete('public/' . $user->pelamar->img_profile);
        }

        // 🔹 Hapus data terkait sesuai role
        if ($user->role === 'admin' && $user->admin) {
            $user->admin->delete();
        } elseif ($user->role === 'finance' && $user->finance) {
            $user->finance->delete();
        } elseif ($user->role === 'perusahaan' && $user->perusahaan) {
            $user->perusahaan->delete();
        } elseif ($user->role === 'pelamar' && $user->pelamar) {
            $user->pelamar->delete();
        }

        // 🔹 Terakhir, hapus user utamanya
        $user->delete();

        return redirect()->route('superadmin.add.user')->with('success', 'Data User Berhasil Dihapus');
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
}
