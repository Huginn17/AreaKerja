<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckProfileCompletion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role === 'pelamar') {

            $pelamar = Auth::user()->pelamar;

            if ($pelamar && !$pelamar->isProfileComplete()) {

                // Jika belum setting session popup
                if (!session()->has('show_first_login_popup')) {
                    session(['show_first_login_popup' => true]);
                    return redirect($request->url());
                }
            }
        }

        return $next($request);
    }
}
