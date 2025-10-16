<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use App\Models\Pelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengalamanOrgController extends Controller
{
    public function create($pelamar_id)
    {
        // $pelamar = Pelamar::findOrFail('pelamar_id');
        // return view('non-user.profile.organisasi.create', compact('pelamar'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_organisasi' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'tahun_awal' => 'required|digits:4|integer',
            'tahun_akhir' => 'nullable|digits:4|integer|gte:tahun_awal',
            'deskripsi' => 'nullable|string',
        ]);

        $validated['pelamar_id'] = Auth::user()->pelamar->id;

        Organisasi::create($validated);
        return redirect()->route('profile.index')->with('success', 'Organisasi berhasil disimpan');
    }

    public function update(Request $request, Organisasi $organisasi)
    {
        $validated = $request->validate([
            'nama_organisasi' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'tahun_awal' => 'required|digits:4|integer',
            'tahun_akhir' => 'nullable|digits:4|integer|gte:tahun_awal',
            'deskripsi' => 'nullable|string',
        ]);

        $validated['pelamar_id'] = Auth::user()->pelamar->id;


        $organisasi->update($validated);
        return redirect()->route('profile.index')->with('success', 'Organisasi berhasil diperbarui');
    }

    public function edit(Organisasi $organisasi)
    {
        return view('non-user.profile.organisasi.edit', ['DT' => $organisasi]);
    }

    public function destroy(Organisasi $organisasi)
    {
        $organisasi->delete();
        return redirect()->back()->with('success', 'Organisasi berhasil dihapus');
    }


    public function storeSuper(Request $request)
    {
        $validated = $request->validate([
            'nama_organisasi' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'tahun_awal' => 'required|digits:4|integer',
            'tahun_akhir' => 'nullable|digits:4|integer|gte:tahun_awal',
            'deskripsi' => 'nullable|string',
        ]);

        $pelamar_id = session('pelamar_terakhir_id');

        if (!$pelamar_id) {
            return back()->with('error', 'Pelamar belum dibuat. Harap buat pelamar terlebih dahulu sebelum menambahkan pendidikan.');
        }

        $validated['pelamar_id'] = $pelamar_id;

        Organisasi::create($validated);

        $pelamar = Pelamar::find($pelamar_id);
        $kategori = str_replace(' ', '_', $pelamar->kategori);

        return redirect()->route('superadmin.pelamar.create', ['kategori' => $kategori])
            ->with('success', 'Organisasi berhasil disimpan');
    }

    public function updateSuper(Request $request, Organisasi $organisasi)
    {
        $validated = $request->validate([
            'nama_organisasi' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'tahun_awal' => 'required|digits:4|integer',
            'tahun_akhir' => 'nullable|digits:4|integer|gte:tahun_awal',
            'deskripsi' => 'nullable|string',
        ]);

        $validated['pelamar_id'] = Auth::user()->pelamar->id;


        $organisasi->update($validated);
        return redirect()->route('superadmin.pelamar.create')->with('success', 'Organisasi berhasil diperbarui');
    }

    public function editSuper(Organisasi $organisasi)
    {
        return view('non-user.profile.organisasi.edit', ['DT' => $organisasi]);
    }

    public function destroySuper(Organisasi $organisasi)
    {
        $organisasi->delete();
        return redirect()->back()->with('success', 'Organisasi berhasil dihapus');
    }
}
