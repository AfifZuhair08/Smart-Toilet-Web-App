<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Manager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role_id == 2) {
            return redirect()->route('staff');
        }

        if (Auth::user()->role_id == 1) {
            return $next($request);
        }
        // return $next($request);
    }


}
