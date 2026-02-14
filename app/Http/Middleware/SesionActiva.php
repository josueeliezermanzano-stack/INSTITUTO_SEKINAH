<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SesionActiva
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('logueado')) {
            return redirect('/registro');
        }

        return $next($request);
    }
}