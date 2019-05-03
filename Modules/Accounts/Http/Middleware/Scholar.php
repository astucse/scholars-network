<?php

namespace Modules\Accounts\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Scholar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
      if (Auth::user()->scholar) {
          return $next($request);
      }else{
          return redirect()->route('login');
      }
      return $next($request);
    }
}
