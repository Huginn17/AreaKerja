<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;

class VerifikasiPerusahaanController extends Controller
{
    public function approve($id)
{
    Perusahaan::findOrFail($id)->update([
        'verification_status' => 'approved',
        'verified_at' => now(),
        'verification_note' => null,
    ]);

    return back()->with('success', 'Perusahaan berhasil diverifikasi.');
}

public function reject(Request $request, $id)
{
    Perusahaan::findOrFail($id)->update([
        'verification_status' => 'rejected',
        'verified_at' => null,
        'verification_note' => $request->note,
    ]);

    return back()->with('success', 'Perusahaan ditolak.');
}
    public function approveSuper($id)
{
    Perusahaan::findOrFail($id)->update([
        'verification_status' => 'approved',
        'verified_at' => now(),
        'verification_note' => null,
    ]);

    return back()->with('success', 'Perusahaan berhasil diverifikasi.');
}

public function rejectSuper(Request $request, $id)
{
    Perusahaan::findOrFail($id)->update([
        'verification_status' => 'rejected',
        'verified_at' => null,
        'verification_note' => $request->note,
    ]);

    return back()->with('success', 'Perusahaan ditolak.');
}

}
