<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PerusahaanVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if (
            $user &&
            $user->role === 'perusahaan' &&
            optional($user->perusahaan)->verification_status !== 'approved'
        ) {
            $message = 'Akun perusahaan Anda belum terverifikasi. Silakan hubungi admin.';

            // JIKA REQUEST AJAX / FETCH
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'type' => 'verification',
                    'message' => $message,
                ], 403);
            }

            
            // JIKA REQUEST HALAMAN BIASA
            return redirect()
                ->route('perusahaan.dashboard')
                ->with('warning', $message);
        }

        return $next($request);
    }
}
