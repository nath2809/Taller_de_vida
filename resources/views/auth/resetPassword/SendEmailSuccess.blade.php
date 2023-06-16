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

                <!------- ALERTA --------->
                
                    @include('layouts.partials.message_success')

                <div class="ContentSuccesEmail">

                    <div class="MessageSuccesEmail">
                        <h1>¡Genial! Revisa la bandeja de entrada de tu correo electrónico, hemos enviado un correo con el enlace para restablecer tu contraseña.</h1>
                        
                    </div>
        
                    <!------- BOTON --------->
                    <div class="ButtonReturnLogin">
                        <a href="/" class="buttonReturn">Volver al inicio</a>
                    </div>

                </div>


            </div>
        </div>
    </div>
 
@endsection

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>