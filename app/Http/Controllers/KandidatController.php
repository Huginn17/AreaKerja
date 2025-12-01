<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KandidatController extends Controller
{
    public function rekrutHalKosong()
    {
       return view('kandidat.kandidat-baru-kosong');
    }

   //  public function rekruthal()
   //  {
   //    return view('kandidat.rekrut-saya');
   //  }



}




