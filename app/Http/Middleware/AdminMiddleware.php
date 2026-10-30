<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            abort(403);
        }

        if (!Auth::check() || Auth::user()->email !== 'admin@admin.cat') {
            abort(403, 'Accés denegat');
        }

        return $next($request);
    }
}