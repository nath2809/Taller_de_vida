@extends('layouts.auth-master')
@section('content')

    <div class="container-login">
        <div class="container-card-login">
    
            <!---------- CARD ------------->
            <div class="CardSendEmail">
                
                <!------------ LOGO DEL CARD ------------->
                <div class="imgSendEmail">
                    <img src="{{url('assets/images/logo.png')}}" alt="" style="border-radius: 20%">
                </div>

                <!------- CONTENIDO DEL FORMULARIO --------->
                <form class="formSendPassword" action="/forgot_password" method="POST" id='form'>
                    @csrf

                <!------- ALERTAS --------->
                
                    @include('layouts.partials.message_errors')

                    <div class="MessageSendEmail">
                        <p>Ingresa la dirección de correo electrónico asociada a tu cuenta para que podamos enviarte un enlace de restablecimiento de contraseña.</p>
                    </div>
                    <div class="form-group-login">
                        <input type="text" name="email" id="email"  placeholder="Ingresa tu email" class="user-input">
                    </div>
    
                    
                    <!------- BOTONES --------->
                    <input type="submit" class="buttonSendEmail" name="btn-login" value=" Enviar enlace ">
                </form>
                
                <div class="MessageBottomSendPassword">
                    <h1>Ya tienes una cuenta? <a href="/"> Inicia Sesion</a></h1>
                </div>
            </div>
        </div>
    </div>
 
@endsection