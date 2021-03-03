<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdminMiddleware
{

    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->idRol == 1){
                return $next($request);
            }
            else
            {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

    }
}
