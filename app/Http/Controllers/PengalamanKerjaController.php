<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use Illuminate\Http\Request;

class PengalamanKerjaController extends Controller
{
    public function store(Request $request, $pelamar_id)
    {
        $validated = $request->validate([
            'posisi_pekerjaan' => 'required|string|max:255',
            'nama_perusahaan' => 'required|string|max:255',
            'jabatan_pekerjaan' => 'nullable|string|max:255',
            'tahun_awal' => 'required|digits:4|integer',
            'tahun_akhir' => 'nullable|digits:4|integer|gte:tahun_awal',
            'deskripsi' => 'nullable|string',
        ]);

        $pelamar = Pelamar::findOrFail($pelamar_id);

        $kerja = $pelamar->pengalaman_kerja()->create($validated);

        return redirect()->back()->with('success', 'Organisasi berhasil ditambahkan');
    }
}
