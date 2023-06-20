<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    
   public function handle(Request $request, Closure $next)
    {
    
        if (auth('web')->check()) {
            return redirect(RouteServiceProvider::HOME);
        }
        if (auth('police')->check()) {
            return redirect(RouteServiceProvider::POLICE);
        }
        if (auth('offense')->check()) {
             return redirect(RouteServiceProvider::OFFENSE);
        }
        return $next($request);
    }
}
