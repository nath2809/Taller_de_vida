@extends('layouts.auth-master')

@section('content')

<div class="ContainerBodyEmail" style="background-color: #ffffff; padding: 20px;">

    <div class="imgBodyEmail">
        <img src="{{url('assets/images/logo.png')}}" alt="">
    </div>

    <div class="ContentBodyemail" style="font-family: Arial, sans-serif; font-size: 16px; color: #333333; line-height: 1.5;">
        <p style="background-color: #cadffb69; padding: 10px; margin-bottom: 10px; font-size: 20px;">Hola, {{ $user->name }}</p>
        
        <p style="margin-bottom: 10px;">Recibimos una solicitud para restablecer la contraseña de tu cuenta en Taller de vida. 
            Haz clic en el siguiente enlace para crear una nueva contraseña:</p>
    
        <div class="ButtonResetPasswordLink" style="margin-bottom: 20px;">
            <a href="http://127.0.0.1:8000/reset-password/{{ $token }}" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: #ffffff; text-decoration: none; border-radius: 4px;">Restablecer Contraseña</a>
        </div>
    
        <p style="margin-bottom: 10px;">Si no solicitaste el restablecimiento de contraseña, no te preocupes. Tu cuenta seguirá siendo segura y no se verá afectada. 
            Si tienes alguna pregunta o inquietud, por favor contáctanos.</p>
    
        <p style="margin-bottom: 10px;">Este enlace expirará en {{ config('auth.passwords.'.config('auth.defaults.passwords').'.expire') }} minutos.</p>
    
        <p style="margin-bottom: 10px;">Gracias,</p>
        <p style="margin-bottom: 10px;">El equipo Taller de vida</p>
    
        <p style="margin-bottom: 10px;">Si tienes algún problema no dudes en contactarnos: tallerDeVida@gmail.com</p>
    </div>
    
</div>

@endsection