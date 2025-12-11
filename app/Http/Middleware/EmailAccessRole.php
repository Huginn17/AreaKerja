<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EmailAccessRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            abort(403); // Tidak login
        }

        $allowedRoles = ['pelamar', 'perusahaan', 'super_admin'];

        if (!in_array(Auth::user()->role, $allowedRoles)) {
            abort(403); // Role tidak diizinkan
        }

        return $next($request);
    }
}
