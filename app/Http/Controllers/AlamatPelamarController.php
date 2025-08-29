<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlamatPelamarController extends Controller
{
    public function index()
    {
        return view('non-user.alamat.create-alamat');
    }
}
