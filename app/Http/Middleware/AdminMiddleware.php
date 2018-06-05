<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        /*if (auth()->user()->id == '43')
        {
            return redirect('/register');
        }
        else
        return redirect('/contact')->with('error','Unauthorised access');
    */
        if (Auth::user() &&  Auth::user()->id == 43) {
        return $next($request);
        }

        return redirect('/contact');
    }
}
