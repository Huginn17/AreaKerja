<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use Illuminate\Http\Request;

class PengalamanOrgController extends Controller
{
    public function store(Request $request, $pelamar_id)
    {
        $validated = $request->validate([
            'nama_organisasi' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'tahun_awal' => 'required|digits:4|integer',
            'tahun_akhir' => 'nullable|digits:4|integer|gte:tahun_awal',
            'deskripsi' => 'nullable|string',
        ]);

        $pelamar = Pelamar::findOrFail($pelamar_id);

        $org = $pelamar->pengalaman_organisasi()->create($validated);

        return redirect()->back()->with('success', 'Organisasi berhasil ditambahkan');
    }
}
