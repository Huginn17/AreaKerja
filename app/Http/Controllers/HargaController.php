<?php

namespace App\Http\Controllers;

use App\Models\Hargakoin;
use App\Models\HargaPembayaran;
use Illuminate\Http\Request;

class HargaController extends Controller
{
    public function index()
    {
        return view('finance.paket-harga.paket-harga', [
            'title' => 'Paket Harga',
            'koin' => Hargakoin::all(),
            'pembayaran' => HargaPembayaran::all(),
        ]);
    }
    //HARGA KOIN
    public function edit_koin()
    {
        return view('finance.paket-harga.edit-koin', [
            'title' => 'Edit Harga Koin',
            'koin' => Hargakoin::all(),
        ]); 
    }
    public function update_koin(Request $request)
    {
        foreach($request->id as $i => $id){
            $koin = Hargakoin::find($id);
            if($koin){
                $koin->harga = $request->harga[$i];
                $koin->save();
            }
        }

        return redirect()->route('finance.paket-harga');
    }


    //HARGA PEMBAYARAN
    public function edit_pembayaran()
    {
        return view('finance.paket-harga.edit-harga', [
            'title' => 'Edit Harga Pembayaran',
            'pembayaran' => HargaPembayaran::all(),
        ]); 
    }
    public function update_pembayaran(Request $request)
    {
        foreach($request->id as $i => $id){
            $pembayaran = HargaPembayaran::find($id);
            if($pembayaran){
                $pembayaran->harga = $request->harga[$i];
                $pembayaran->save();
            }
        }

        return redirect()->route('finance.paket-harga');
    }


    //TOP UP
    public function top_up()
    {
        return view('finance.paket-harga.top-up', [
            'title' => 'Top Up',
        ]); 
    }


}
