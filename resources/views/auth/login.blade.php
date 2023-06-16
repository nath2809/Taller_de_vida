@extends('layouts.auth-master')

@section('content')

    <div class="container-login">
        <div class="container-card-login">
    
            <!---------- CARD ------------->
            <div class="card-login">
                
                <!------------ LOGO DEL CARD ------------->
                <div class="img-login">
                    <img src="{{url('assets/images/logo.png')}}" alt="" style="border-radius: 20%">
                </div>

                <!------- CONTENIDO DEL FORMULARIO --------->
                <form  class="form-login" action="/login" method="POST" id='form'>
                    @csrf


                <!------- ALERTAS --------->
                    @include('layouts.partials.message_success')
                    @include('layouts.partials.message_errors')

                    
                    <div class="form-group-login">
                        <input type="text" name="name" id="name"  placeholder="Ingresa tu email" class="user-input">
                    </div>
    
                    <div class="form-group-login">
                        <input type="password" name="password" id="password" placeholder="Ingresa tu contraseña" class="password-input" >
                    </div>
    
                    <div class="forgot-password">
                     
                        <a href="/forgot_password">¿Olvidaste tu contraseña?</a>

                    </div>
    

                <!------- BOTONES --------->
                    <input type="button" onclick="validateLogin()" class="button-login" name="btn-login" value="Ingresar">
                    <h1 class="register-link"> No tienes cuenta? <a href="/register">Registrate</a></h1>
                </form>
    
            </div>
        </div>
    </div>
 
@endsection

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>