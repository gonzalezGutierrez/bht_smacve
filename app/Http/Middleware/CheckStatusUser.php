<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckStatusUser
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
        if(Auth::check())
        {
            if ($request->user()->eliminado == 1) {

                Auth::logout();
                $request->session()->flush();
                $request->session()->regenerate();
                return redirect('/login')->with('warning',"Acceso Denegado. Usuario eliminado.");

            }
            // SI EL USUARIO NO ESTA ELIMINADO
            return $next($request);
        }
        else{
            return redirect('login');
        }
    }
}
