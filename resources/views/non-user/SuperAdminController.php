<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AlamatPelamar;
use App\Models\CatatanCash;
use App\Models\CatatanKoin;
use App\Models\Divisi;
use App\Models\Finance;
use App\Models\Hargakoin;
use App\Models\HargaPembayaran;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\LowonganPerusahaan;
use App\Models\Pelamar;
use App\Models\Perusahaan;
use App\Models\Provinsi;
use App\Models\SuperAdmin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SuperAdminController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $lastMonth = Carbon::now()->subMonth();

        $totalPelamar = Pelamar::count();
        $lastPelamar = Pelamar::whereMonth('created_at', $lastMonth->month)
            ->whereYear('created_at', $lastMonth->year)
            ->count();
        $growthPelamar = $this->calcGrowth($lastPelamar, $totalPelamar);

        $totalPerusahaan = Perusahaan::count();
        $lastPerusahaan = Perusahaan::whereMonth('created_at', $lastMonth->month)
            ->whereYear('created_at', $lastMonth->year)
            ->count();
        $growthPerusahaan = $this->calcGrowth($lastPerusahaan, $totalPerusahaan);

        $totalAdmin = User::where('role', 'admin')->count();
        $lastAdmin = User::where('role', 'admin')
            ->whereMonth('created_at', $lastMonth->month)
            ->whereYear('created_at', $lastMonth->year)
            ->count();
        $growthAdmin = $this->calcGrowth($lastAdmin, $totalAdmin);

        $totalSuperAdmin = User::where('role', 'super_admin')->count();
        $lastSuperAdmin = User::where('role', 'super_admin')
            ->whereMonth('created_at', $lastMonth->month)
            ->whereYear('created_at', $lastMonth->year)
            ->count();
        $growthSuperAdmin = $this->calcGrowth($lastSuperAdmin, $totalSuperAdmin);

        return view('super_admin.dashboard', [
            "title" => "Dashboard",
            'totalPerusahaan' => $totalPerusahaan,
            'growthPerusahaan' => $growthPerusahaan,
            'totalPelamar' => $totalPelamar,
            'growthPelamar' => $growthPelamar,
            'totalAdmin' => $totalAdmin,
            'growthAdmin' => $growthAdmin,
            'totalSuperAdmin' => $totalSuperAdmin,
            'growthSuperAdmin' => $growthSuperAdmin,
        ]);
    }

    /**
     * Hitung pertumbuhan dalam persen (%)
     * @param int $last jumlah bulan lalu
     * @param int $current jumlah sekarang
     * @return float
     */
    private function calcGrowth($last, $current)
    {
        if ($last == 0 && $current > 0) return 100; // dari 0 ke ada = +100%
        if ($last == 0 && $current == 0) return 0;  // tetap 0
        return round((($current - $last) / $last) * 100, 1);
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

        session()->forget(['pelamar_terakhir_id', 'kategori_terakhir']);

        return view('super_admin.pelamar.data-pelamar', [
            'kandidat' => $kandidat,
            'nonKandidat' => $nonKandidat,
            'calonKandidat' => $calonKandidat,
        ]);
    }


    //CRUD KANDIDAT CALON KANDIDAT NON KANDIDAT
    public function createKategori($kategori)
    {

        // Validasi slug kategori yang diizinkan
        $allowedKategori = ['non_kandidat', 'calon_kandidat', 'kandidat'];

        if (!in_array($kategori, $allowedKategori)) {
            abort(404);
        }

        // Ambil data divisi hanya jika kategori = calon_kandidat atau kandidat
        $divisis = collect();
        if (in_array($kategori, ['calon_kandidat', 'kandidat'])) {
            $divisis = Divisi::all();
        }

        $pelamar = null;

        if (session('pelamar_terakhir_id')) {
            $pelamarSession = Pelamar::find(session('pelamar_terakhir_id'));

            // Pastikan hanya pakai data dari session kalau kategorinya sama
            if ($pelamarSession) {
                $mapKategori = [
                    'pelamar' => 'non_kandidat',
                    'calon kandidat' => 'calon_kandidat',
                    'kandidat aktif' => 'kandidat',
                ];

                $kategoriPelamar = $mapKategori[strtolower($pelamarSession->kategori)] ?? null;

                if ($kategoriPelamar === $kategori) {
                    $pelamar = $pelamarSession;
                }
            }
        }

        // Kirim data ke view
        return view('super_admin.pelamar.tambah-kandidat-superadmin', [
            'kategori' => $kategori, // tetap kirim slug (agar cocok dengan Blade)
            'divisis'  => $divisis,
            'pelamar'  => $pelamar
        ]);
    }




    public function storeUser(Request $request)
    {
        // dd($request->all());
        // 1️⃣ Cek apakah user sudah ada berdasarkan email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            $user = User::create([
                'username' => $request->username,
                'email'    => $request->email,
                'password' => bcrypt($request->password),
                'role'     => 'pelamar',
                'status'   => 0,
            ]);
        }


        // 2️⃣ Cek apakah pelamar sudah ada berdasarkan user_id
        $pelamar = Pelamar::where('user_id', $user->id)->first();

        $path = null;
        if ($request->hasFile('img_profile')) {
            $path = $request->file('img_profile')->store('images', 'public');
        }

        if (!$pelamar) {
            $pelamar = Pelamar::create([
                'user_id'         => $user->id,
                'nama_pelamar'    => $request->nama_pelamar,
                'deskripsi_diri'  => $request->deskripsi_diri,
                'tanggal_lahir'   => $request->tanggal_lahir,
                'gender'          => $request->gender,
                'telepon_pelamar' => $request->telepon_pelamar,
                'divisi'          => $request->divisi,
                'kategori'        => $request->kategori,
                'img_profile'     => $path,
            ]);
        } else {
            // Jika pelamar sudah ada dan upload foto baru, ganti
            if ($request->hasFile('img_profile')) {
                if ($pelamar->img_profile && Storage::exists('public/' . $pelamar->img_profile)) {
                    Storage::delete('public/' . $pelamar->img_profile);
                }
                $pelamar->update(['img_profile' => $path]);
            }
        }



        // 3️⃣ Simpan session
        session([
            'pelamar_terakhir_id' => $pelamar->id,
            'kategori_terakhir' => $pelamar->kategori
        ]);

        // 4️⃣ Simpan relasi-relasi lain (alamat, pendidikan, dst)
        if ($request->alamat) {
            foreach ($request->alamat as $data) {
                $pelamar->alamat_pelamar()->create($data);
            }
        }

        if ($request->pendidikan) {
            foreach ($request->pendidikan as $data) {
                $pelamar->riwayat_pendidikan()->create($data);
            }
        }

        if ($request->organisasi) {
            foreach ($request->organisasi as $data) {
                $pelamar->pengalaman_organisasi()->create($data);
            }
        }

        if ($request->pengalaman_kerja) {
            foreach ($request->pengalaman_kerja as $data) {
                $pelamar->pengalaman_kerja()->create($data);
            }
        }

        if ($request->skill) {
            foreach ($request->skill as $data) {
                $pelamar->skill()->create($data);
            }
        }

        // ✅ 5️⃣ Simpan sosmed (update atau create baru)
        if ($request->has('social_media') && is_array($request->social_media)) {
            $pelamar->sosmed()->updateOrCreate([], $request->social_media);
        }

        $isComplete =
            $pelamar->alamat_pelamar()->exists() &&
            $pelamar->riwayat_pendidikan()->exists() &&
            $pelamar->pengalaman_organisasi()->exists() &&
            $pelamar->pengalaman_kerja()->exists() &&
            $pelamar->skill()->exists();

        $mapKategori = [
            'pelamar' => 'non_kandidat',
            'calon kandidat' => 'calon_kandidat',
            'kandidat aktif' => 'kandidat',
        ];

        $kategori = $mapKategori[strtolower($pelamar->kategori)] ?? 'non_kandidat';

        if ($isComplete) {
            return redirect()->route('superadmin.pelamar')
                ->with('success', 'Data pelamar berhasil disimpan dan semua data sudah lengkap.');
        }

        return redirect()->route('superadmin.pelamar.create', ['kategori' => $kategori])
            ->with('success', 'Data pendidikan berhasil disimpan.');
    }

    public function editUser($kategori, $id)
    {

        $pelamar = Pelamar::with([
            'user',
            'alamat_pelamar',
            'riwayat_pendidikan',
            'pengalaman_organisasi',
            'pengalaman_kerja',
            'skill',
            'sosmed',
        ])->find($id);

        if (!$pelamar) {
            abort(404, "Pelamar ID kandidat tidak ditemukan");
        }

        $divisis = Divisi::all();

        $mapKategori = [
            'pelamar' => 'non_kandidat',
            'calon kandidat' => 'calon_kandidat',
            'kandidat aktif' => 'kandidat',
        ];

        $kategori = $mapKategori[strtolower($pelamar->kategori)] ?? 'non_kandidat';

        return view('super_admin.pelamar.edit-kandidat-superadmin', compact('pelamar', 'divisis', 'kategori'));
    }


    public function updateUser(Request $request, $id)
    {
        $pelamar = Pelamar::findOrFail($id);

        $user = $pelamar->user ?? null;

        $request->validate([
            'nama_pelamar' => 'required|string|max:255',
            'email'        => 'required|email',
            'username'     => 'required|string|max:255',
            'password'     => 'nullable|min:3',
            'img_profile'  => 'nullable|image',
        ]);

        // Update foto profil
        $path = $pelamar->img_profile;
        if ($request->hasFile('img_profile')) {
            if ($pelamar->img_profile && Storage::exists('public/' . $pelamar->img_profile)) {
                Storage::delete('public/' . $pelamar->img_profile);
            }
            $path = $request->file('img_profile')->store('images', 'public');
        }

        // Update data utama
        $pelamar->update([
            'nama_pelamar'    => $request->nama_pelamar,
            'deskripsi_diri'  => $request->deskripsi_diri,
            'tanggal_lahir'   => $request->tanggal_lahir,
            'gender'          => $request->gender,
            'telepon_pelamar' => $request->telepon_pelamar,
            'divisi'          => $request->divisi,
            'kategori'        => $request->kategori,
            'gaji_minimal'    => $request->gaji_minimal,
            'gaji_maksimal'   => $request->gaji_maksimal,
            'img_profile'     => $path,
        ]);


        if ($user) {
            $user->update([
                'username' => $request->username,
                'email'    => $request->email,
                'password' => $request->filled('password')
                    ? bcrypt($request->password)
                    : $user->password, // kalau password kosong, jangan diubah
            ]);
        }


        // Tambahkan data baru relasi
        if ($request->filled('alamat')) {
            $pelamar->alamat_pelamar()->delete();
            foreach ($request->alamat as $data) {
                $pelamar->alamat_pelamar()->create($data);
            }
        }

        if ($request->filled('pendidikan')) {
            $pelamar->riwayat_pendidikan()->delete();
            foreach ($request->pendidikan as $data) {
                $pelamar->riwayat_pendidikan()->create($data);
            }
        }

        if ($request->filled('organisasi')) {
            $pelamar->pengalaman_organisasi()->delete();
            foreach ($request->organisasi as $data) {
                $pelamar->pengalaman_organisasi()->create($data);
            }
        }

        if ($request->filled('pengalaman_kerja')) {
            $pelamar->pengalaman_kerja()->delete();
            foreach ($request->pengalaman_kerja as $data) {
                $pelamar->pengalaman_kerja()->create($data);
            }
        }

        if ($request->filled('skill')) {
            $pelamar->skill()->delete();
            foreach ($request->skill as $data) {
                $pelamar->skill()->create($data);
            }
        }

        // Sosial media
        if ($request->has('social_media') && is_array($request->social_media)) {
            $pelamar->sosmed()->updateOrCreate([], $request->social_media);
        }

        // Mapping kategori ke slug untuk redirect
        $mapKategori = [
            'pelamar' => 'non_kandidat',
            'calon kandidat' => 'calon_kandidat',
            'kandidat aktif' => 'kandidat',
        ];

        $kategori = $mapKategori[strtolower($pelamar->kategori)] ?? 'non_kandidat';

        return redirect()->route('superadmin.pelamar')
            ->with('success', 'Data pelamar berhasil diperbarui.');
    }


    public function destroyUser($id)
    {
        try {

            $pelamar = Pelamar::findOrFail($id);


            $pelamar->alamat_pelamar()->delete();
            $pelamar->riwayat_pendidikan()->delete();
            $pelamar->pengalaman_organisasi()->delete();
            $pelamar->pengalaman_kerja()->delete();
            $pelamar->skill()->delete();
            $pelamar->sosmed()->delete();


            if ($pelamar->img_profile && Storage::exists('public/' . $pelamar->img_profile)) {
                Storage::delete('public/' . $pelamar->img_profile);
            }

            $user = $pelamar->user;
            $pelamar->delete();

            if ($user && !Pelamar::where('user_id', $user->id)->exists()) {
                $user->delete();
            }

            return redirect()->route('superadmin.pelamar')->with('success', 'Data pelamar berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
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

    public function createForm(SuperAdmin $superadmin)
    {
        $provinsis = Provinsi::all();
        // $superadmin->load(['kota', 'kecamatan', 'provinsi']);
        return view('super_admin.add.create', [
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

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'email'        => 'required|email|unique:users',
            'username'     => 'required|unique:users',
            'role'         => 'required|in:admin,finance,perusahaan,pelamar',
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
            case 'pelamar':
                Pelamar::create([
                    'user_id'           => $user->id,
                    'nama_pelamar'      => $request->nama_pelamar,
                    'telepon_pelamar'   => $request->telepon_pelamar,
                    'img_profile'       => $imgPath,
                    'deskripsi_diri'    => $request->deskripsi_diri,
                    'kategori'          => $request->kategori,
                    'gender'            => $request->gender,
                    'gaji_minimal'      => $request->gaji_minimal,
                    'gaji_maksimal'     => $request->gaji_maksimal,
                    'tanggal_lahir'     => $request->tanggal_lahir,
                ]);
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
                        'nama_pelamar'  => $request->nama_pelamar,
                        'telepon_pelamar'   => $request->telepon_pelamar,
                        'deskripsi_diri'    => $request->deskripsi_diri,
                        'tanggal_lahir'      => $request->tanggal_lahir,
                        'gender'          => $request->gender,
                        'kategori'      => $request->kategori,
                        'gaji_minimal'  => $request->gaji_minimal,
                        'gaji_maksimal' => $request->gaji_maksimal,
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


    public function halPerusahaan()
    {
        $perusahaan = Perusahaan::all();
        return view('super_admin.perusahaan.data-perusahaan', [
            'perusahaan' => $perusahaan
        ]);
    }

    public function detailPerusahaan($id)
    {
        $perusahaan = Perusahaan::with(['user', 'lowonganPerusahaans'])->findOrFail($id);
        return view('super_admin.perusahaan.detail-perusahaan', [
            'perusahaan' => $perusahaan
        ]);
    }

    public function detailLowongan($id)
    {
        $lowongan = LowonganPerusahaan::with(['perusahaan'])->findOrFail($id);

        return view('super_admin.perusahaan.detail-lowongan', [
            'lowongan' => $lowongan
        ]);
    }




    //FINANCE
    public function halFinance()
    {
        $cash = CatatanCash::where('status', 'diterima')->get();
        $koin1 = CatatanKoin::all();
        $cashTerbaru = CatatanCash::orderBy('created_at', 'desc')->get();
        $koinTerbaru = CatatanKoin::orderBy('created_at', 'desc')->get();
        return view('super_admin.finance.paket-harga', [
            'title' => 'Paket Harga',
            'koin' => Hargakoin::all(),
            'pembayaran' => HargaPembayaran::all(),
            'cashTerbaru' => $cashTerbaru,
            'koinTerbaru' => $koinTerbaru,
            'cash' => $cash,
            'koin1' => $koin1
        ]);
    }

    //HARGA KOIN
    public function edit_koin()
    {
        return view('super_admin.finance.edit-koin', [
            'title' => 'Edit Harga Koin',
            'koin' => Hargakoin::all(),
        ]);
    }
    public function update_koin(Request $request)
    {
        foreach ($request->id as $i => $id) {
            $koin = Hargakoin::find($id);
            if ($koin) {
                $koin->harga = $request->harga[$i];
                $koin->save();
            }
        }

        return redirect()->route('superadmin.paket-harga');
    }


    //HARGA PEMBAYARAN
    public function edit_pembayaran()
    {
        return view('super_admin.finance.edit-harga', [
            'title' => 'Edit Harga Pembayaran',
            'pembayaran' => HargaPembayaran::all(),
        ]);
    }
    public function update_pembayaran(Request $request)
    {
        foreach ($request->id as $i => $id) {
            $pembayaran = HargaPembayaran::find($id);
            if ($pembayaran) {
                $pembayaran->harga = $request->harga[$i];
                $pembayaran->save();
            }
        }

        return redirect()->route('superadmin.paket-harga');
    }


    public function panggilan()
    {
        return view('super_admin.panggilan.data-panggilan');
    }
}
