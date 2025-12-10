<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenLowonganController extends Controller
{
    public function gold()
    {
        return view('super_admin.manajemenlowongan.settinglowongangold');
    }

    public function silver()
    {
        return view('super_admin.manajemenlowongan.settinglowongansilver');
    }

    public function bronze()
    {
        return view('super_admin.manajemenlowongan.settinglowonganbronze');
    }
}
