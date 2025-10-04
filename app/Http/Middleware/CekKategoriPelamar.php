<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekKategoriPelamar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $kategori)
    {
       $user = Auth::user();

       if (!$user || !$user->pelamar) {
        return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
       }

       if($user->pelamar->kategori !== $kategori){
        return redirect()->route('pelamar.daftar-kandidat')->with('error', 'Anda harus login sebagai ' . $kategori . ' terlebih dahulu.');
       }

       
        return $next($request);
    }
}
