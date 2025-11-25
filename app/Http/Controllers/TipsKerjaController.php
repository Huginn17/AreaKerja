<?php

namespace App\Http\Controllers;

use App\Models\TipsKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TipsKerjaController extends Controller
{
    public function index()
    {
        return view('admin.tips-kerja.tips-kerja', [
            "title"     =>   "Tips Kerja",
            "all"       =>    TipsKerja::count(),
            "terbit"    =>    Tipskerja::where('status', 'terbit')->count(),
            "noterbit"  =>    Tipskerja::where('status', 'belum terbit')->count(),
            "sudah_terbit"  =>    Tipskerja::where('status', 'terbit')->get(),
            "belum_terbit"  =>    Tipskerja::where('status', 'belum terbit')->get(),
            "semua"     => Tipskerja::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function tips_kerja_buat_post()
    {
        return view('admin.tips-kerja.buat-post');
    }

    public function store_tips_kerja(Request $request)
    {
        $d = $request->validate([
            'title'   => 'nullable|string',
            'content' => 'nullable|string',
            'penulis' => 'nullable|string',
            'image'   => 'nullable|image|mimes:png,jpg,jpeg',
            'status'  => 'nullable|in:terbit,belum terbit',
            'intro'   => 'nullable|string',
            'section' => 'nullable|json',
        ]);

        // Tambah slug
        if (!empty($request->title)) {
            // Contoh: judul → "tips-wawancara-kerja"
            $baseSlug = Str::slug($request->title);
            $slug = $baseSlug;

            // Cek apakah slug sudah digunakan → jika ya, tambahkan angka di belakang
            $counter = 1;
            while (TipsKerja::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter++;
            }
        } else {
            // Title kosong → slug pakai timestamp agar tetap unik
            $slug = 'tips-' . time();
        }

        $d['slug'] = $slug;

        $d['penulis'] = Auth::user()->username;
        $d['status'] = 'belum terbit';

        if (empty($request->intro) && !empty($request->content)) {
            $d['intro'] = Str::limit(strip_tags($request->content), 150);
        } else {
            $d['intro'] = $request->intro;
        }

        if (empty($request->section) && !empty($request->content)) {
            $paragraphs = preg_split('/\r\n|\r|\n/', strip_tags($request->content));

            $sections = [];
            foreach ($paragraphs as $index => $pgr) {
                if (trim($pgr) !== '') {
                    $sections[] = [
                        "judul" => "Bagian " . ($index + 1),
                        "isi"   => $pgr,
                    ];
                }
            }

            $d['section'] = json_encode($sections);
        } else {
            $d['section'] = $request->section;
        }

        if ($request->hasFile('image')) {
            if ($request->image && Storage::exists('public/' . $request->image)) {
                Storage::delete('public/' . $request->image);
            }
            $d['image'] = $request->file('image')->store('images', 'public');
        }

        TipsKerja::create($d);

        return redirect()->route('admin.tips-kerja')->with('success', 'Data berhasil disimpan.');
    }


    public function update_status(Request $request)
    {
        $ids = $request->ids;

        if (!$ids) {
            return redirect()->back()->with('error', 'Data yang ingin diubah tidak ditemukan.');
        }

        TipsKerja::where('id', $ids)->update([
            'status' => $request->status
        ]);
        return redirect()->route('admin.tips-kerja')->with('success', 'Data berhasil diubah.');
    }

    public function destroy(Request $request)
    {
        $ids = $request->ids;

        if (!$ids) {
            return redirect()->back()->with('error', 'Data yang ingin dihapus tidak ditemukan.');
        }

        TipsKerja::whereIn('id', $ids)->delete();
        return redirect()->route('admin.tips-kerja')->with('success', 'Data berhasil dihapus.');
    }





    //TIPS KERJA SUPERADMIN
    public function index_superadmin()
    {
        return view('super_admin.tips-kerja.tips-kerja', [
            "title"     =>   "Tips Kerja",
            "all"       =>    TipsKerja::count(),
            "terbit"    =>    Tipskerja::where('status', 'terbit')->count(),
            "noterbit"  =>    Tipskerja::where('status', 'belum terbit')->count(),
            "sudah_terbit"  =>    Tipskerja::where('status', 'terbit')->get(),
            "belum_terbit"  =>    Tipskerja::where('status', 'belum terbit')->get(),
            "semua"     => Tipskerja::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function tips_kerja_buat_post_superadmin()
    {
        return view('super_admin.tips-kerja.buat-tips');
    }

    public function store_tips_kerja_superadmin(Request $request)
    {
        $d = $request->validate([
            'title'   => 'nullable|string',
            'content' => 'nullable|string',
            'penulis' => 'nullable|string',
            'image'   => 'nullable|file|image|mimes:png,jpg,jpeg',
            'status'  => 'nullable',
            'intro'   => 'nullable|string',
            'section' => 'nullable|json',
        ]);

        // ==== SLUG ====
        if (!empty($request->title)) {

            // Buat slug dasar
            $baseSlug = Str::slug($request->title);
            $slug = $baseSlug;

            // Cek apakah slug sudah ada
            $counter = 1;
            while (TipsKerja::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter++;
            }
        } else {
            // Title kosong → slug pakai timestamp
            $slug = 'tips-' . time();
        }

        $d['slug'] = $slug;
        // ==============


        $d['penulis'] = Auth::user()->username;
        $d['status'] = 'belum terbit';

        if (empty($request->intro) && !empty($request->content)) {
            $d['intro'] = Str::limit(strip_tags($request->content), 150);
        } else {
            $d['intro'] = $request->intro;
        }

        if (empty($request->section) && !empty($request->content)) {
            $paragraphs = preg_split('/\r\n|\r|\n/', strip_tags($request->content));

            $sections = [];
            foreach ($paragraphs as $index => $pgr) {
                if (trim($pgr) !== '') {
                    $sections[] = [
                        "judul" => "Bagian " . ($index + 1),
                        "isi"   => $pgr,
                    ];
                }
            }

            $d['section'] = json_encode($sections);
        } else {
            $d['section'] = $request->section;
        }

        if ($request->hasFile('image')) {
            if ($request->image && Storage::exists('public/' . $request->image)) {
                Storage::delete('public/' . $request->image);
            }
            $d['image'] = $request->file('image')->store('images', 'public');
        }

        TipsKerja::create($d);

        return redirect()->route('superadmin.tips-kerja')->with('success', 'Data berhasil disimpan.');
    }


    public function update_status_superadmin(Request $request)
    {
        $ids = $request->ids;

        if (!$ids) {
            return redirect()->back()->with('error', 'Data yang ingin diubah tidak ditemukan.');
        }

        TipsKerja::where('id', $ids)->update([
            'status' => $request->status
        ]);
        return redirect()->route('superadmin.tips-kerja')->with('success', 'Data berhasil diubah.');
    }

    public function destroy_superadmin(Request $request)
    {
        $ids = $request->ids;

        if (!$ids) {
            return redirect()->back()->with('error', 'Data yang ingin dihapus tidak ditemukan.');
        }

        TipsKerja::whereIn('id', $ids)->delete();
        return redirect()->route('superadmin.tips-kerja')->with('success', 'Data berhasil dihapus.');
    }
}
