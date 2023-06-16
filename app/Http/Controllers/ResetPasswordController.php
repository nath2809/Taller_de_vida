<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;



class ResetPasswordController extends Controller
{
 
    // ------------------------- \\
    
    public function showResetForm(Request $request, $token){
        return view('auth.resetPassword.resetPassword')->with([
            'token' => $token
        ]);
    }

    // ------------------------- \\

    public function resetPassword(UpdatePasswordRequest $request){

        // Buscar el registro de password_resets correspondiente al token proporcionado
        $passwordReset = DB::table('password_resets')
            ->where('token', $request->token)
            ->first();
    
        // Si no se encuentra un registro correspondiente, redirigir al usuario con un mensaje de error
        if (!$passwordReset) {
            return redirect()
                ->back()
                ->withErrors(['email' => 'No se encontró un registro correspondiente al token proporcionado.']);
        }
    
        // Buscar el usuario correspondiente al correo electrónico proporcionado en el registro de password_resets
        $user = User::where('email', $passwordReset->email)->first();
    
        // Actualizar la contraseña del usuario
        $user->update([
            'password' => Hash::make($request->password),
        ]);
    
        // Eliminar el registro de password_resets correspondiente
        DB::table('password_resets')->where('email', $passwordReset->email)->delete();
    
        // Redirigir al usuario a la página de inicio de sesión con un mensaje de éxito
        return redirect()->to('/')->with('passwordResetOk', 'ok');
    }
    
    
}
