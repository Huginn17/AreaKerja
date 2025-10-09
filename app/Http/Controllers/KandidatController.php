<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KandidatController extends Controller
{
    public function rekrutHalKosong()
    {
       return view('kandidat.kandidat-baru-kosong');
    }

    public function rekrutHalKunci()
    {
       return view('kandidat.kandidat-ak-selanjutnya');
    }

   //  public function rekruthal()
   //  {
   //    return view('kandidat.rekrut-saya');
   //  }



}




