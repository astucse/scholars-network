<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
          if (Auth::user()->scholar) {
            return redirect(route('home.scholar'));
          }elseif (Auth::user()->representative) {
            return redirect(route('home.university'));
          }
        }

        return $next($request);
    }
}
