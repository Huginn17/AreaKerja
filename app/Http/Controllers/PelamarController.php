<?php

namespace App\Http\Controllers;

use App\Models\LowonganPerusahaan;
use Illuminate\Http\Request;

class PelamarController extends Controller
{
    public function index()
    {
        $lowongan = LowonganPerusahaan::latest()->get();
        return view('non-user.home', compact('lowongan'));
    }
}
