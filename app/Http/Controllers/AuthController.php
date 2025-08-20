<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('non-user.auth.login');
    }

     public function regis()
    {
        return view('non-user.auth.register');
    }

      public function verif()
    {
        return view('non-user.auth.verifikasi');
    }

      public function verifcode()
    {
        return view('non-user.auth.verifikasicode');
    }

      public function veriflupapw()
    {
        return view('non-user.auth.verif-lupa-sandi');
    }

}
        