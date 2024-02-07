<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->guest()) {
            abort(403);
        }

        $userRole = auth()->user()->role->name;

        // Izinkan akses jika peran adalah 'admin' atau 'petugas'
        if ($userRole !== 'admin' && $userRole !== 'petugas') {
            abort(403);
        }

        return $next($request);
    }
}
