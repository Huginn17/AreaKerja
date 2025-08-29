<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function login_superadmin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username Harus Diisi',
            'password.required' => 'Password Harus Diisi',
        ]);
        $infologin = [
            'username' => $request->username,
            'password' =>  $request->password
        ];

        // $remember = $request->has('remember');

        if (Auth::attempt($infologin)) {
            $request->session()->regenerate();

            // $user = Auth::user();
            if (Auth::user()->role == 'super_admin') {
                return redirect()->route('superadmin.dashboard');
            }
        } else {

            return back();
        }
    }
    public function logout_superadmin(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


    //pelamar
    public function beranda()
    {
        $firstLogin = session()->pull('first_login', false);
        return view('non-user.home', compact('firstLogin'));
    }

    public function loginproses(Request $request)
    {
        $val = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($val)) {
            $request->session()->regenerate();

            // Hanya set sekali waktu login pertama
            if (!$request->session()->has('already_logged')) {
                $request->session()->put('first_login', true);
                $request->session()->put('already_logged', true);
            }

            return redirect()->route('beranda');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }


    public function regis_proses(Request $request)
    {
        $valid = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $valid['password'] = Hash::make($request->password);
        $user = User::create($valid);

        $valid_datapelamar = $request->validate([
            'telepon_pelamar' => 'required'
        ]);

        $user->pelamar()->create($valid_datapelamar);

        return response()->json([
        'success' => true,
    ]);

    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }







    //  NON USER
    public function login_non_user()
    {
        return view('non-user.auth.login');
    }

    public function regis_non_user()
    {
        return view('non-user.auth.register');
    }

    public function verif_non_user()
    {
        return view('non-user.auth.verifikasi');
    }

    public function verifcode_non_user()
    {
        return view('non-user.auth.verifikasicode');
    }
    public function veriflupapw_non_user()
    {
        return view('non-user.auth.verif-lupa-sandi');
    }





    //FINANCE
    public function login_finance()
    {
        return view('finance.auth.login');
    }

    public function regis_finance()
    {
        return view('finance.auth.register');
    }

    public function verif_finance()
    {
        return view('finance.auth.verifikasi');
    }

    public function verifotp_finance()
    {
        return view('finance.auth.verif-codepw');
    }

    public function veriflupapw_finance()
    {
        return view('finance.auth.verif-lupa-sandi');
    }







    //ADMIN
    public function login_admin()
    {
        return view('admin.auth.login');
    }

    public function regis_admin()
    {
        return view('admin.auth.register');
    }

    public function verif_admin()
    {
        return view('admin.auth.verif');
    }

    public function verifotp_admin()
    {
        return view('admin.auth.verif-otp');
    }

    public function veriflupapw_admin()
    {
        return view('admin.auth.verif-lupapw');
    }







    //SUPER ADMIN 
    public function login_super_admin()
    {
        return view('super_admin.auth.login');
    }

    public function regis_super_admin()
    {
        return view('super_admin.auth.register');
    }

    public function verif_super_admin()
    {
        return view('super_admin.auth.verif');
    }

    public function verifotp_super_admin()
    {
        return view('super_admin.auth.verif-otp');
    }

    public function veriflupapw_super_admin()
    {
        return view('super_admin.auth.verif-lupapw');
    }





    //PERUSAHAAN
    public function login_perusahaan()
    {
        return view('perusahaan.auth.login');
    }
    public function regis_perusahaan()
    {
        return view('perusahaan.auth.register');
    }

    public function verif_perusahaan()
    {
        return view('perusahaan.auth.verif');
    }

    public function verifotp_perusahaan()
    {
        return view('perusahaan.auth.verif-otp');
    }

    public function veriflupapw_perusahaan()
    {
        return view('perusahaan.auth.verif-lupapw');
    }
}
