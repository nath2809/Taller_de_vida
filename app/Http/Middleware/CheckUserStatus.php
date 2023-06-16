<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserStatus
{
    public function handle($request, Closure $next)
    {
        // Verificar si el usuario está autenticado
        if (Auth::check()) {
            // Verificar si el usuario tiene el estado "active"
            if (Auth::user()->status === 'Active') {
                return $next($request);
            } else {
                // Si el usuario tiene el estado "inactive", cerrar la sesión y redirigirlo a la página de inicio de sesión con un mensaje de error.
                Auth::logout();
                return redirect('/')->with('error', 'Inactive');
            }
        } else {
            // Si el usuario no está autenticado, redirigirlo a la página de inicio de sesión
            return redirect('/');
        }
    }
}
