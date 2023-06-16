
@extends('layouts.auth-master')

@section('content')

    <div class="container-login">
        <div class="container-card-login">
        
                <!-------------- CARD -------------->
            <div class="CardRegisterUsers">

                <div class="message-card-register">
                    <h1>Registrate ingresando tus datos Correctamente!</h1>
                </div>
                

                <!------------- CONTENIDO DEL FORMULARIO -------------->
                <form action="/register" method="POST" id="formRegister" enctype="multipart/form-data">
                    <div class="container-form">
        
                        @csrf

                        <!-- INPUT - FOTO DE PERFIL -->
                        <div class="form-group-register">
                            <label for="image_profile">Selecciona tu foto de Perfil</label>
                            <input type="file" name="image_profile" id="image_profile" class="email-input" >
                            
                            @if ($errors->has('image_profile'))
                                <span class="error text-danger" for='input-image_profile'>{{ $errors->first('image_profile') }}</span>  
                            @endif
                        </div>

                        <!-- DIV QUE CONTIENE UN INPUT -->
                        <div class="form-group-register">
                            <label for="name">Nombre</label>
                            <input type="text" value="{{old('name')}}" name="name" id="name" class="user-input">
                        </div>
                        
                        <!-- DIV QUE CONTIENE UN INPUT -->
                        <div class="form-group-register">
                            <label for="surnames">Apellidos</label>
                            <input type="text" value="{{old('surnames')}}" name="surnames" id="surnames" class="email-input" >
                        </div>

                        <!-- DIV QUE CONTIENE UN SELECT -->
                        
                        <div class="form-group-register">
                            <label for="type_document">Tipo de documento</label>
                            
                            <select name="type_document" class="form-select" id="type_document">
                                <option value="" selected disabled>Seleccione Tipo de Documento</option>
                                <option value="Cédula de Extranjería" {{ old('type_document') === 'Cédula de Extranjería' ? 'selected' : '' }}>Cédula de extranjería</option>
                                <option value="Cédula de Ciudadanía" {{ old('type_document') === 'Cédula de Ciudadanía' ? 'selected' : '' }}>Cédula de ciudadanía</option>
                                <option value="Tarjeta de Identidad" {{ old('type_document') === 'Tarjeta de Identidad' ? 'selected' : '' }}>Tarjeta de identidad</option>
                            </select>
                        
                            @if ($errors->has('type_document'))
                                <span class="error text-danger" for="select-type_document">{{ $errors->first('type_document') }}</span>
                            @endif
                        </div>
                        

                        <!-- DIV QUE CONTIENE UN INPUT -->
                        <div class="form-group-register">
                            <label for="document_number">Numero de documento</label>
                            <input type="text" value="{{old('document_number')}}" name="document_number" id="document_number" class="email-input" >
                            @if ($errors->has('document_number'))
                            <span class="error text-danger" for='input-document_number'>{{$errors->first('document_number')}}</span>  
                            @endif
                        </div>

                        <!-- DIV QUE CONTIENE UN INPUT -->
                        <div class="form-group-register">
                            <label for="email">Correo electronico</label>
                            <input type="email" value="{{old('email')}}"name="email" id="email"class="email-input" >
                            @if ($errors->has('email'))
                            <span class="error text-danger" for='input-email'>{{$errors->first('email')}}</span>  
                            @endif
                        </div>  

                        <!-- DIV QUE CONTIENE UN INPUT -->
                        <div class="form-group-register">
                        <label for="phone_number">Numero de celular</label>
                        <input type="text" value="{{old('phone_number')}}" name="phone_number" id="phone_number"class="email-input" >
                        @if ($errors->has('phone_number'))
                        <span class="error text-danger" for='input-phone_number'>{{$errors->first('phone_number')}}</span>  
                        @endif
                    </div>

                        <!-- DIV QUE CONTIENE UN INPUT - Departamento -->
                    <div class="form-group-register">
                        <label for="region">Departamento</label>
                        <select name="region" id="region" class="form-select">
                            @foreach($departamentos as $departamento)
                                <option value="{{ $departamento['departamento'] }}" {{ old('region') === $departamento['departamento'] ? 'selected' : '' }}>
                                    {{ $departamento['departamento'] }}
                                </option>
                            @endforeach
                        </select>
                    </div> 

                        <!-- DIV QUE CONTIENE UN INPUT -->
                    <div class="form-group-register">
                        <label for="city">Ciudad</label>
                            <select name="city" id="city" class="form-select">
                            </select>
                    </div> 
        
    
                    @section('scripts')
                            <script>
                                const ciudades = {!! json_encode($ciudades) !!};
                                loadCities(ciudades);
                            </script>
                        @endsection
    
                    
                        <!-- DIV QUE CONTIENE UN INPUT -->
                        <div class="form-group-register">
                            <label for="birthdate">Fecha de nacimiento</label>
                            <input type="date" value="{{old('birthdate')}}" name="birthdate" id="birthdate"class="email-input" >
                            @if ($errors->has('birthdate'))
                            <span class="error text-danger" for='input-birthdate'>{{$errors->first('birthdate')}}</span>  
                            @endif
                        </div>
                        

                        <!-- DIV QUE CONTIENE UN INPUT -->
                        <div class="form-group-register">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" id="password" class="password-input" >
                            @if ($errors->has('password'))
                            <span class="error text-danger" for='input-password'>{{$errors->first('password')}}</span>  
                            @endif
                        </div>



                        <!-- DIV QUE CONTIENE UN INPUT -->
                        <div class="form-group-register">
                            <label for="password-confirmation">Confirma tu contraseña</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="password-confirmation-input" >
                            @if ($errors->has('password_confirmation'))
                            <span class="error text-danger" for='input-password_confirmation'>{{$errors->first('password_confirmation')}}</span>  
                            @endif
                        </div>
            


                    </div>

                        <!-- DIV QUE CONTIENE LOS BOTONES -->
                        <div>
                            <div class=" buttons-register">
                                <input type="button" onclick="validateRegister()"class="button-register" name="btn-register" value="Crear cuenta">
                                <a class="button-cancel "href="/">Cancelar</a>
                            </div>
                        </div>

                </form>
        
            </div>
        </div>
    </div>
    
@endsection
    
<script src="{{url('assets/js/scripts.js')}}"></script>