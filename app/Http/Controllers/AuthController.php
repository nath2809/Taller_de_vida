<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    // ------------------------- \\
    
    public function show(){

        //Creo un condicional que valida si hay una sesion abierta para redirigir al usuario hacia el home.
        if(Auth::check()){
            return redirect('/home');
        }
        
        // Si no existe ninguna sesion abierta directamente se vuelve a mostrar la page de home.
        return view('auth.login');
    }

    // ------------------------- \\

    public function login(LoginRequest $request){

        $credentials = $request->getCredentials();

        if(!Auth::Validate($credentials)){
            return redirect()->to('/')->withErrors('Usuario y\o contrasena incorrectos');
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);
        return $this->authenticated($request, $user);

    }

    // ------------------------- \\

    public function authenticated(Request $request, $user){
        return redirect('/home');
    }

    // ------------------------- \\

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->to('/')->with('logout', 'ok');
    }
}
