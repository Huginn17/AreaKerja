<?php

namespace App\Http\Controllers;

use App\Models\LowonganPerusahaan;
use App\Models\PaketLowongan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LowonganPerusahaanController extends Controller
{
    public function index()
    {
        $lowongans = LowonganPerusahaan::with(['perusahaan', 'paket'])->latest()->paginate(10);
        return view('lowongan-perusahaan.index', compact('lowongans'));
    }

    public function createForm()
    {
        $pakets = PaketLowongan::all();
        return view('perusahaan.tambah-lowongan', compact('pakets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis' => 'required|string',
            'gaji-min' => 'required|numeric',
            'gaji-max' => 'required|numeric',
            'deskripsi' => 'required|string',
            'pendidikan' => 'required|array',
            'gender' => 'required|string',
            'umur-min' => 'required|numeric',
            'umur-max' => 'required|numeric',
            'batas-waktu' => 'required|date',
        ]);

        LowonganPerusahaan::create([
            'perusahaan_id'   => auth()->user()->perusahaan->id,
            'nama'            => $request->judul,
            'slug'            => Str::slug($request->judul),
            'jenis'           => $request->jenis,
            'gaji_awal'       => $request->input('gaji-min'),
            'gaji_akhir'      => $request->input('gaji-max'),
            'label_gaji'      => $request->periode ?? null,
            'deskripsi'       => $request->deskripsi,
            'alamat'          => $request->alamat,
            'kategori'        => null, // bisa disesuaikan kalau mau ada kategori
            'batas_lamaran'   => $request->{'batas-waktu'},
            'syarat_pekerjaan' => json_encode([
                'pendidikan' => $request->pendidikan,
                'jurusan'    => $request->jurusan,
                'gender'     => $request->gender,
                'umur'       => [
                    'min' => $request->{'umur-min'},
                    'max' => $request->{'umur-max'},
                ]
            ]),
            'tanggung_jawab'  => null,
            'benefit'         => null,
            'paket_id'        => null, // isi sesuai paket kalau ada
        ]);

        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil ditambahkan!');
    }

    public function show(LowonganPerusahaan $lowongan)
    {
        return view('lowongan-perusahaan.show', compact('lowongan'));
    }

    public function edit(LowonganPerusahaan $lowongan)
    {
        return view('lowongan-perusahaan.edit', compact('lowongan'));
    }

    public function update(Request $request, LowonganPerusahaan $lowongan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string',
            'gaji_awal' => 'nullable|numeric',
            'gaji_akhir' => 'nullable|numeric',
            'alamat' => 'nullable|string',
            'kategori' => 'nullable|string',
            'batas_lamaran' => 'nullable|date',
        ]);

        $lowongan->update($request->all());

        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil diperbarui.');
    }

    public function destroy(LowonganPerusahaan $lowongan)
    {
        $lowongan->delete();
        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil dihapus.');
    }
}
