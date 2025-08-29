<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
         $user = auth()->user();

    $pelamar = Pelamar::where('user_id', $user->id)
                ->with('pengalaman_organisasi')
                ->first();

    return view('non-user.profile.profile', compact('pelamar'));
    }
}
