@extends('layouts.auth-master')
@section('content')

    <div class="ContainerBodyEmail">

        <div class="imgBodyEmail">
            <img src="{{url('assets/images/reset-password.png')}}" alt="">
        </div>

        <div class="ContentBodyemail">
            <p>Recibimos una solicitud para restablecer la contraseña de tu cuenta en {{ config('app.name') }}. 
                Haz clic en el siguiente enlace para crear una nueva contraseña:</p>

            <div class="ButtonResetPasswordLink">
                <a href="">Restablecer Contraseña</a>
            </div>

            <p>Si no solicitaste el restablecimiento de contraseña, no te preocupes. Tu cuenta seguirá siendo segura y no se verá afectada. 
                Si tienes alguna pregunta o inquietud, por favor contáctanos.</p>

                <p>Gracias,</p>
                <p>El equipo de {{ config('app.name') }}</p>
        </div>



    </div>

@endsection