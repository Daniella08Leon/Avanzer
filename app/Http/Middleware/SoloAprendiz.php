<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoloAprendiz
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
        switch(auth::user()->idRolFK){
            case ('1'):
                return redirect('administrador/fichas');//si es administrador redirige al HOME
            break;
			case('2'):
                return redirect('instructor/ficha');/// si es un usuario normal redirige a la ruta USER
			break;	
            case ('3'):
                return $next($request);
            break;
            case ('4'):
                return redirect('coordinador/fichas');//si es coordinador redirige al cordinador
            break;
        }
    }
}
