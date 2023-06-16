<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{

    public function handle(Request $request, Closure $next, $roles)
    {

        $user = $request->user();
        $rolesArray = explode('|', $roles); // Convertir el parámetro $roles en un array
        
        if (!$user || !$user->role || !in_array($user->role->name, $rolesArray)) {
            abort(403, 'No estas Autorizado');
        }
        return $next($request);
        
    }
}

