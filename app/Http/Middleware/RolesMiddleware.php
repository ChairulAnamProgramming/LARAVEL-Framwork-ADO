<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RolesMiddleware
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

        if (Auth::user()->role == 'User') {
            return redirect('/');
        }
        return $next($request);
    }
}
