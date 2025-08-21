<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
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
      public function veriflupapw_non_user  ()
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


}
        