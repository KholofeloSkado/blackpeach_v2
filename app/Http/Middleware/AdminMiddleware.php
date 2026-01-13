<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
  public function handle(Request $request, Closure $next)
    {
        // Dev mode: allow everything so you can build/admin without auth issues
        if (app()->environment('local')) {
            return $next($request);
        }

        // Production: require authenticated admin user
        if (! $request->user() || $request->user()->role !== 'admin') {
            abort(403, 'Admin access required');
        }

        return $next($request);
    }
}
