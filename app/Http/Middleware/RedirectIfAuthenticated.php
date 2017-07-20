<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
      switch ($guard) {



              // redireccion al volver al login ya con sesion abierta
        default:
          if (Auth::guard($guard)->check()) {
              if (Auth::user()->cargo == 'Secretaria') {
                return redirect('/Secretaria/gestionarReservas');
              }
              if (Auth::user()->cargo == 'Administrador') {
                return redirect('/Administrador/gestionarPacientes');
              }
              if (Auth::user()->cargo == 'Director') {
                return redirect('/Director/estadisticasMensuales');
              }
          }
          break;
      }


      return $next($request);
    }
}
