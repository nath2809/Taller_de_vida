@extends('layouts.app-master')


@section('content')

<div class="container-register-user-admin">
    <div class="container-card-register-user-admin">

        <!------ CARD ------>
        <div class="card-register-admin">
            <div class="titleCreateRegister">
                <h1>Estas agregando un nuevo líder</h1>
                <p>Por favor, completa todos los campos correctamente. Asegúrate de proporcionar la información requerida y verificar que esté escrita correctamente. ¡Gracias por tu colaboración!</p>
            </div>

        <!-- CONTENIDO DEL FORMULARIO -->

        <form action="/user_create" method="POST" id="formRegister" enctype="multipart/form-data">
            <div class="container-form">
                    @csrf

            <!-- INPUT - FOTO DE PERFIL -->
                <div class="form-group-register">
                    <label for="image_profile">Selecciona tu foto de Perfil</label>
                    <input type="file" value="{{old('image_profile')}}"name="image_profile" id="image_profile" class="email-input" >
                    
                    @if ($errors->has('image_profile'))
                        <span class="error text-danger" for='input-image_profile'>{{$errors->first('image_profile')}}</span>  
                    @endif
                </div>

            <!-- INPUT - NOMBRE -->

                <div class="form-group-register">
                    <label for="name">Nombre</label>
                    <input type="text" value="{{old('name')}}"name="name" id="name" class="inputs_register_user">
                    @if ($errors->has('name'))
                    <span class="error text-danger" for='input-name'>{{$errors->first('name')}}</span>  
                    @endif
                </div>
                    
            <!-- INPUT - APELLIDO -->
                <div class="form-group-register">
                    <label for="surnames">Apellidos</label>
                    <input type="text" value="{{old('surnames')}}"name="surnames" id="surnames" class="inputs_register_user" >
                </div>
                    
                <!-- INPUT - TIPO DE DOCUMENTO -->
                <div class="form-group-register">
                    <label for="type_document">Tipo de documento</label>
                    <select name="type_document" class="form-select" id="type_document">
                        <option selected>Seleccione Tipo de Documento</option>
                        <option value="Cédula de Ciudadanía">Cedula de ciudadania</option>
                        <option value="Tarjeta de Identidad">Tarjeta de identidad</option>
                        <option value="Cédula de Extranjería">Cedula de extrangeria</option>
                    </select>
                </div>

                <!-- INPUT - NUMERO DE DOCUMENTO -->
                <div class="form-group-register">
                    <label for="document">Numero de documento</label>
                    <input type="text" value="{{old('document_number')}}" name="document_number" id="document_number" class="inputs_register_user" >
                    @if ($errors->has('document_number'))
                        <span class="error text-danger" for='input-document_number'>{{$errors->first('document_number')}}</span>  
                    @endif
                </div>

                <!-- INPUT - EMAIL -->
                <div class="form-group-register">
                    <label for="email">Correo electrónico</label>
                    <input type="text" value="{{old('email')}}"name="email" id="email"class="inputs_register_user" >
                    @if ($errors->has('email'))
                    <span class="error text-danger" for='input-email'>{{$errors->first('email')}}</span>  
                    @endif
                </div>

                <!-- INPUT - NUMERO DE TELEFONO -->
                <div class="form-group-register">
                    <label for="phone_number">Número de teléfono</label>
                    <input type="text" value="{{old('phone_number')}}"name="phone_number" id="phone_number" class="inputs_register_user" >
                    @if ($errors->has('phone_number'))
                    <span class="error text-danger" for='input-phone_number'>{{$errors->first('phone_number')}}</span>  
                    @endif
                </div>   
                   <!-- DIV QUE CONTIENE UN INPUT -->
                   <div class="form-group-register">
                    <label for="region">Departamento</label>
                    <select name="region" id="region" class="form-select">
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento['departamento'] }}">{{ $departamento['departamento'] }}</option>
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
                    
                <!-- INPUT - FECHA DE NACIMIENTO -->
                <div class="form-group-register">
                    <label for="birthdate">Fecha de nacimiento</label>
                    <input type="date" value="{{old('birthdate')}}" name="birthdate" id="birthdate"class="inputs_register_user" >
                    @if ($errors->has('birthdate'))
                        <span class="error text-danger" for='input-birthdate'>{{$errors->first('birthdate')}}</span>  
                    @endif
                </div>

                <!-- INPUT - CONTRASENA -->
                <div class="form-group-register">
                    <label for="role">Role</label>
                    <select name="role_id" class="form-select" id="role_id">
                        <option selected>Seleccione el Rol del usuario</option>
                        @foreach ($roles as $roles )
                            <option value="{{$roles->id}}">{{$roles->name}}</option>
                        @endforeach
                        @if ($errors->has('role_id'))
                        <span class="error text-danger" for='input-role_id'>{{$errors->first('role_id')}}</span>  
                        @endif
                    </select>
                </div>   
                    
                <!-- INPUT - CONTRASENA -->
                <div class="form-group-register">
                    <label for="password">Contraseña</label>
                    <input type="password" value="{{old('password')}}" name="password" id="password" class="inputs_register_user" >
                    @if ($errors->has('password'))
                        <span class="error text-danger" for='input-password'>{{$errors->first('password')}}</span>  
                    @endif
                </div>            

                 <!-- INPUT - CONFIRMACION DE CONTRASENA -->
                 <div class="form-group-register">
                    <label for="password_confirmation">Confirma la constraseña</label>
                    <input type="password" value="{{old('password_confirmation')}}" name="password_confirmation" id="password_confirmation" class="inputs_register_user" >
                    @if ($errors->has('password_confirmation'))
                        <span class="error text-danger" for='input-password_confirmation'>{{$errors->first('password_confirmation')}}</span>  
                    @endif
                </div> 

            </div>

                <!-- BOTONES -->
                <div>
                    <div class=" buttons-register">
                        <input type="button" onclick="validateRegister()"class="button-register" name="btn-register" value="Crear usuario">
                        <a class="button-cancel "href="/users">Cancelar</a>
                    </div>
                </div>      
        </form>

        </div>
    </div>
</div>


@endsection
<script src="{{url('assets/js/scripts.js')}}"></script>
