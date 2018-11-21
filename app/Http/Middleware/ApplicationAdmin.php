<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class ApplicationAdmin
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
        if (!Auth::user()->isUserApplicationAdmin()) {
            Session::flash('error', "You don't have enough permissions!");

            return redirect()->route('home');
        }
        return $next($request);
    }
}
