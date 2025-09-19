<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CVController extends Controller
{
    public function download($id)
    {
        $pelamar = Pelamar::with('user')->findOrFail($id);
        $user = $pelamar->user; // relasi ke tabel users

        $pdf = Pdf::loadView('cv.template', compact('user', 'pelamar'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('CV-' . $user->name . '.pdf');
    }

    public function preview($id)
    {
        $pelamar = Pelamar::with('user')->findOrFail($id);
        $user = $pelamar->user;

        $pdf = Pdf::loadView('cv.template', compact('user', 'pelamar'))
            ->setPaper('a4', 'portrait');

        return $pdf->stream('CV-' . $user->name . '.pdf');
    }

    public function save($id)
    {
        $pelamar = Pelamar::with('user')->findOrFail($id);
        $user = $pelamar->user;

        $pdf = Pdf::loadView('cv.template', compact('user', 'pelamar'))
            ->setPaper('a4', 'portrait');

        $fileName = 'CV-' . $user->id . '-' . now()->format('YmdHis') . '.pdf';
        $pdf->save(storage_path('app/public/cv/' . $fileName));

        return response()->json([
            'message' => 'CV berhasil disimpan',
            'file' => asset('storage/cv/' . $fileName)
        ]);
    }
}
