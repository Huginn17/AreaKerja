<?php

namespace App\Http\Controllers;

use App\Models\DaftarBank;
use App\Models\HargaPembayaran;
use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function masuk(Request $request)
    {
        $valid = $request->validate([
            "username"   =>    "required",
            "password"   =>    "required"
        ]);
        if (Auth::attempt($valid)) {
            if (Auth::user()->role == 'super_admin') {
                return redirect('/dashboard/superadmin');
            } elseif (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif (Auth::user()->role == 'pelamar') {
                return redirect('/');
            } elseif (Auth::user()->role == 'perusahaan') {
                return redirect()->route('perusahaan.dashboard');
            } elseif (Auth::user()->role == 'finance') {
                return redirect('/dashboard/finance');
            }
        } else {
            return back();
        }
        return back();
    }



    //pelamar
    public function beranda()
    {
        $firstLogin = session()->pull('first_login', false);
        return view('non-user.home', compact('firstLogin'));
    }

    public function loginproses(Request $request)
    {
        $valid = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($valid)) {
            $user = Auth::user();
            if ($user->status == 0) {
                if (Auth::user()->role == 'super_admin') {
                    return redirect()->route('superadmin.dashboard');
                } elseif (Auth::user()->role == 'admin') {
                    return redirect()->route('admin.dashboard');
                } elseif (Auth::user()->role == 'pelamar') {
                    return redirect('/');
                } elseif (Auth::user()->role == 'perusahaan') {
                    return redirect()->route('perusahaan.dashboard');
                } elseif (Auth::user()->role == 'finance') {
                    return redirect()->route('finance.dashboard');
                }
            } else {
                Auth::logout();
                return back()->withErrors([
                    'username' => 'Akun anda tidak aktif',
                ]);
            }
        } else {
            return back()->withErrors([
                'username' => 'Username atau password salah.',
            ]);
        }
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

    public function logout_pelamar(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


    //LOGIN PERUSAHAAN
    public function beranda_perusahaan()
    {
        return view('perusahaan.dashboard', [
            'hargaPembayarans' => HargaPembayaran::all(),
            'daftarBank' => DaftarBank::all()
        ]);
    }
    public function loginproses_perusahaan(Request $request)
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

            return redirect()->route('perusahaan.dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }


    public function regis_proses_perusahaan(Request $request)
    {
        $valid = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $valid['password'] = Hash::make($request->password);
        $user = User::create($valid);

        $valid_dataperusahaan = $request->validate([
            'telepon_perusahaan' => 'required',
            'nama_perusahaan' => 'nullable'
        ]);

        $valid_dataperusahaan['nama_perusahaan'] = $request->username;

        $user->perusahaan()->create($valid_dataperusahaan);

        return response()->json([
            'success' => true,
        ]);
    }


    public function logout_perusahaan(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('perusahaan.dashboard');
    }



    //LOGIN FINANCE
    public function beranda_finance()
    {
        return view('finance.dashboard');
    }

    public function loginproses_finance(Request $request)
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

            return redirect()->route('finance.dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }


    public function regis_proses_finance(Request $request)
    {
        $valid = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $valid['password'] = Hash::make($request->password);
        $user = User::create($valid);

        $valid_datafinance = $request->validate([
            'nama_lengkap' => 'nullable',
        ]);

        $user->finance()->create($valid_datafinance);

        return response()->json([
            'success' => true,
        ]);
    }


    public function logout_finance(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('finance.login');
    }



    //LOGIN ADMIN
    public function login_admin()
    {
        return view('admin.auth.login');
    }
    public function beranda_admin()
    {
        return view('admin.dashboard');
    }

    public function loginproses_admin(Request $request)
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

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    public function regis_admin()
    {
        return view('admin.auth.register');
    }

    public function regis_proses_admin(Request $request)
    {
        $valid = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $valid['password'] = Hash::make($request->password);
        $user = User::create($valid);

        $valid_dataadmin = $request->validate([
            'nama_lengkap' => 'nullable',
        ]);

        $user->admin()->create($valid_dataadmin);

        return response()->json([
            'success' => true,
        ]);
    }


    public function logout_admin(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }




    //LOGIN SUPER ADMIN
    public function login_superadmin()
    {
        return view('super_admin.auth.login');
    }
    public function loginproses_superadmin(Request $request)
    {
        $val = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($val)) {
            if (Auth::user()->role == "super_admin") {
                return redirect()->route('superadmin.dashboard');
            }
        } else {
            return back();
        }
    }

    public function regis_super_admin()
    {
        return view('super_admin.auth.register');
    }

    public function regis_proses_superadmin(Request $request)
    {
        $valid = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $valid['password'] = Hash::make($request->password);
        $user = User::create($valid);

        $valid_datasuperadmin = $request->validate([
            'nama_lengkap' => 'nullable',
        ]);

        $user->superadmin()->create($valid_datasuperadmin);

        return response()->json([
            'success' => true,
        ]);
    }

    public function logout_superadmin(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('superadmin.login');
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
