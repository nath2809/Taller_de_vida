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
                <form class="formSendPassword" action="/reset-password" method="POST" id='form'>
                    @csrf

                <!------- ALERTAS --------->
                
                    @include('layouts.partials.message_errors')

                    <div class="MessageSendEmail">
                        <p>Ingresa tu nueva contraseña, recuerda que tiene que tener 8 caracteres o mas</p>
                    </div>

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group-login">
                        <input type="password" name="password" id="password" class="user-input" placeholder="Ingresa la nueva contraseña">
                    </div>

                    <div class="form-group-login">
                        <input type="password" name="password_confirmation" id="password-confirmation" class="user-input" placeholder="Confirma la contraseña">
                    </div>
    
                    
                    <!------- BOTONES --------->
                    <input type="submit" class="buttonSendEmail" name="btn-login" value="Restablecer contraseña">
                </form>
                
            </div>
        </div>
    </div>
 
@endsection