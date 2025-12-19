<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CronAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
    public function handle(Request $request, Closure $next): Response
    {

        if ($request->header('X-CRON-TOKEN') !== config('app.cron_token')) {
            abort(403, 'Unauthorized cron access');
        }

        return $next($request);
    }
}
