<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "manager" && Auth::guard($guard)->check()) {
            return redirect('/admin/manager');
        }
        if ($guard == "teacher" && Auth::guard($guard)->check()) {
            return redirect('/teacher/dashboard');
        }
        if ($guard == "school" && Auth::guard($guard)->check()) {
            return redirect('/school/dashboard');
        }
        if (Auth::guard($guard)->check()) {
            return redirect('/');
        }

        return $next($request);
    }
}
