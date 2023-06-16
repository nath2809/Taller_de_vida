<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\SendEmailRequest;
use Illuminate\Support\Facades\Password;
use App\Mail\ResetPasswordMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{

    // ------------------------- \\

    public function showLinkRequestForm(){
        
        return view('auth.resetPassword.sendEmail');
    }

    // ------------------------- \\

    public function sendResetLinkEmail(SendEmailRequest $request){
    
        $email = $request->input('email');
    
        // Verifica si el correo electrónico proporcionado por el usuario está registrado en la base de datos
        $user = User::where('email', $email)->first();
    
        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'El email ingresado no se encuentra registrado']);
        }
    
        // Genera el token
        $token = Str::random(60);
    
        // Crea un registro en la tabla "password_resets" con el token y el correo electrónico del usuario
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => now()
        ]);
    
        // Envía el correo electrónico
        $correo = new ResetPasswordMailable($token,$user);
        Mail::to($email)->send($correo);
    
        return redirect()->to('/password_reset_success')->with('sendOk', 'ok');
    }
    
}
