<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use App\Models\PengalamanKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengalamanKerjaController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'posisi_pekerjaan' => 'required|string|max:255',
            'nama_perusahaan' => 'required|string|max:255',
            'jabatan_pekerjaan' => 'nullable|string|max:255',
            'tahun_awal' => 'required|digits:4|integer',
            'tahun_akhir' => 'nullable|digits:4|integer|gte:tahun_awal',
            'deskripsi' => 'nullable|string',
        ]);

        $validated['pelamar_id'] = Auth::user()->pelamar->id;

        PengalamanKerja::create($validated);
        return redirect('/profile');
        return back();
    }

    public function update(Request $request, PengalamanKerja $kerja)
    {
        $validated = $request->validate([
            'posisi_pekerjaan' => 'required|string|max:255',
            'nama_perusahaan' => 'required|string|max:255',
            'jabatan_pekerjaan' => 'nullable|string|max:255',
            'tahun_awal' => 'required|digits:4|integer',
            'tahun_akhir' => 'nullable|digits:4|integer|gte:tahun_awal',
            'deskripsi' => 'nullable|string',
        ]);

        $validated['pelamar_id'] = Auth::user()->pelamar->id;


        $kerja->update($validated);
        return redirect('/profile');
        return back();
    }

    public function edit(PengalamanKerja $kerja)
    {
        return view('non-user.profile.kerja.edit', ['DK' => $kerja]);
    }

    public function destroy(PengalamanKerja $kerja)
    {
        $kerja->delete();
        return redirect()->back()->with('success', 'Pengalaman Kerja berhasil dihapus');
    }
}
