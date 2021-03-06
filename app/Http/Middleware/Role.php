<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Role
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
         if(!Auth::check())
        {
            return redirect()->route('login');
        }

            // teacher role == 1
        if(Auth::user()->role == 1)
        {
            return $next($request);
        }
             // student role == 2
         if(Auth::user()->role == 2)
        {
            return redirect()->route('student');
        }
        
    }
}
