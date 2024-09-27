<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class AdminAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user() && auth()->user()->role == 2){
            return $next($request);
        }
        return redirect('/');
    }
}
