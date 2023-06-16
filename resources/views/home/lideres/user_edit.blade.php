@extends('layouts.app-master')

@section('content')

<div class="container-register-user-admin">
    <div class="container-card-register-user-admin">

        <!------------ CARD ------------------>
        <div class="card-register-admin">

            <div class="titleCreateRegister">
                <h1>Estas editando la información de {{$user->name}}</h1>
            </div>

        <!-- CONTENIDO DEL FORMULARIO -->
            <form action="{{url('user_edit/'.$user->id)}}" method="POST" id="formEdit">
                @csrf
                {{method_field('PATCH')}}

            <div class="container-form">

                <!-- DIV QUE CONTIENE UN INPUT -->
                <div class="form-group-register">
                    <label for="name">Nombre</label>
                    <input type="text" value="{{ old('name',$user->name)}}"name="name" id="name" class="user-input">
                </div>

                <!-- DIV QUE CONTIENE UN INPUT -->
                <div class="form-group-register">
                    <label for="surnames">Apellidos</label>
                    <input type="text" value="{{old('surnames',$user->surnames)}}"name="surnames" id="surnames" class="email-input" >
                </div>
                
                <!-- DIV QUE CONTIENE UN SELECT -->
                <div class="form-group-register">
                    <label for="type_document">Tipo de documento</label>
                    <select name="type_document" class="form-select" id="type_document">
                        <option >{{$user->type_document}}</option>
                        <option value="Cédula de Extranjería">Cédula de extranjería</option>
                        <option value="Cédula de Ciudadanía">Cédula de ciudadanía</option>
                        <option value="Tarjeta de Identidad">Tarjeta de identidad</option>
                    </select>
                </div>
                    
                <!-- DIV QUE CONTIENE UN INPUT -->
                <div class="form-group-register">
                    <label for="document">Numero de documento</label>
                    <input type="text" value="{{old('document_number',$user->document_number)}}" name="document_number" id="document_number" class="email-input" >
                    @if ($errors->has('document_number'))
                        <span class="error text-danger" for='input-document_number'>{{$errors->first('document_number')}}</span>  
                    @endif
                </div>

                <!-- DIV QUE CONTIENE UN INPUT -->
                <div class="form-group-register">
                    <label for="email">Correo electrónico</label>
                    <input type="email" value="{{old('email',$user->email)}}"name="email" id="email"class="email-input" >
                    @if ($errors->has('email'))
                        <span class="error text-danger" for='input-email'>{{$errors->first('email')}}</span>  
                    @endif
                </div>

                <!-- DIV QUE CONTIENE UN INPUT -->
                <div class="form-group-register">
                    <label for="phone_number">Número de teléfono</label>
                    <input type="text" value="{{old('phone_number',$user->phone_number)}}"name="phone_number" id="phone_number"class="email-input" >
                    @if ($errors->has('email'))
                    <span class="error text-danger" for='input-phone_number'>{{$errors->first('phone_number')}}</span>  
                    @endif
                </div>

                <!-- DIV QUE CONTIENE UN INPUT PARA EL DEPARTAMENTO -->
                <div class="form-group-register">
                    <label for="region">Departamento</label>
                    <select name="region" id="region" class="form-select">
                        <option value="{{old('region',$user->region)}}">{{$user->region}}</option>
                        @foreach($departamentos as $departamento)
                        <option value="{{ $departamento['departamento'] }}">{{ $departamento['departamento'] }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- DIV QUE CONTIENE UN INPUT PARA LA CIUDAD -->
                <div class="form-group-register">
                    <label for="city">Ciudad</label>
                    <select name="city" id="city" class="form-select">
                        <option value="{{ old('city', $user->city) }}" selected>{{ old('city', $user->city) }}</option>
                    </select>
                </div>
       
  
                   @section('scripts')
                   <script>
                        const ciudades = {!! json_encode($ciudades) !!};
                        loadCities(ciudades);
                        updateCities(ciudades);
                    </script>
                    @endsection
                
                <!-- DIV QUE CONTIENE UN INPUT -->
                <div class="form-group-register">
                    <label for="birthdate">Fecha de nacimiento</label>
                    <input type="date" value="{{old('birthdate',$user->birthdate)}}" name="birthdate" id="birthdate"class="email-input" >
                </div>
                    
                <!-- DIV QUE CONTIENE UN SELECT -->
                <div class="form-group-register">
                    <label for="status">Estado del usuario</label>
                    <select name="status" class="form-select" id="status">
                        <option >{{$user->status}}</option>
                        <option value="Active">Activo</option>
                        <option value="Inactive">Inactivo</option>
                    </select>
                </div>
                    
                <!-- DIV QUE CONTIENE UN SELECT -->
                <div class="form-group-register">
                    <label for="role">Rol del usuario</label>
                    <select name="role_id" class="form-select" id="role_id">
                        <option value="{{$user->role_id}}">Selecciona</option>
                        @foreach ($roles as $roles )
                            <option value="{{$roles->id}}">{{$roles->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

                <!-- BOTONES-->
                <div>
                    <div class=" buttons-register">
                        <input type="button" onclick="confirmarCambiosUser()"class="button-register" value="Guardar cambios">
                        <a class="button-cancel "href="{{url('/users')}}">Cancelar</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection

<script src="{{url('assets/js/scripts.js')}}"></script>
