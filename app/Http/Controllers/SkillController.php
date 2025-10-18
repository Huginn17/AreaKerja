<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'skill' => 'required|string|max:255',
            'experience_level' => 'nullable|string|max:255',
        ]);

        $validated['pelamar_id'] = Auth::user()->pelamar->id;

        Skill::create($validated);
        return redirect()->route('profile.index')->with('success', 'Pengalaman Kerja berhasil disimpan');
    }

    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'skill' => 'required|string|max:255',
            'experience_level' => 'nullable|string|max:255',
        ]);

        $validated['pelamar_id'] = Auth::user()->pelamar->id;


        $skill->update($validated);
        return redirect('/profile');
        return back();
    }

    public function edit(Skill $skill)
    {
        return view('non-user.profile.skill.edit', ['DS' => $skill]);
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->back()->with('success', 'Pengalaman Kerja berhasil dihapus');
    }



    public function storeSuper(Request $request)
    {
        $validated = $request->validate([
            'skill' => 'required|string|max:255',
            'experience_level' => 'nullable|string|max:255',
        ]);
        $pelamar_id = session('pelamar_terakhir_id');

        if (!$pelamar_id) {
            return back()->with('error', 'Pelamar belum dibuat. Harap buat pelamar terlebih dahulu sebelum menambahkan pendidikan.');
        }

        $validated['pelamar_id'] = $pelamar_id;

        Skill::create($validated);
        $pelamar = Pelamar::find($pelamar_id);


        $mapKategori = [
            'pelamar' => 'non_kandidat',
            'calon kandidat' => 'calon_kandidat',
            'kandidat aktif' => 'kandidat',
            'kandidat nonaktif' => 'kandidat_nonaktif',
        ];

        $kategori = $mapKategori[strtolower($pelamar->kategori)] ?? 'non_kandidat';

        return redirect()->route('superadmin.pelamar.create', ['kategori' => $kategori])
            ->with('success', 'Organisasi berhasil disimpan');
    }

    public function updateSuper(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'skill' => 'required|string|max:255',
            'experience_level' => 'nullable|string|max:255',
        ]);

        $validated['pelamar_id'] = Auth::user()->pelamar->id;


        $skill->update($validated);
        return redirect()->route('superadmin.pelamar.create')->with('success', 'Pengalaman Kerja berhasil diperbarui');
    }

    public function editSuper(Skill $skill)
    {
        return view('non-user.profile.skill.edit', ['DS' => $skill]);
    }

    public function destroySuper(Skill $skill)
    {
        $skill->delete();
        return redirect()->back()->with('success', 'Pengalaman Kerja berhasil dihapus');
    }
}
