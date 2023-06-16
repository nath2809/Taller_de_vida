@extends('layouts.app-master')

@section('content')

    <div class="containerInfoProfile">
        
        <!------------------------------------------------------------------------------------------------------------>

        <form action="{{url('edit_profile/'.$user->id)}}" method="POST" id="formEdit" enctype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}
            
            <!------------------------------------------------------------------------------------------------------------>
            <!--Card ( EDITAR FOTO )-->  
            <!------------------------------------------------------------------------------------------------------------>
            
            <!------------------------------------------------------------------------------------------------------------>
            <!--Card ( EDITAR INFORMACION BASICA )-->   
            
            <div class="informationContentSection">

                <div class="textTitleInformation">
                    <h1>Estas editando la información de tu Perfil!</h1>
                </div>
                
                <div class="textTitleInformation">
                        <h1>Información básica</h1>
                    </div>
                    
                    <div class="name_basic_information basicStyleDiv">
                        <h1 for="file">Selecciona una nueva foto de Perfil</h1>
                        <input type="file" name="image_profile" value="" class="inputUpdateProfile">
                        @if ($errors->has('image_profile'))
                            <span class="error text-danger" for='input-image_profile'>{{$errors->first('image_profile')}}</span>  
                        @endif
                    </div>

                    <div class="name_basic_information basicStyleDiv">
                        <h1>Nombre:</h1>
                        <input type="text" value="{{ old('name',$user->name)}}"name="name" id="name" class="inputUpdateProfile">
                    </div>

                    <div class="name_basic_information basicStyleDiv">
                        <h1>Apellidos:</h1>
                        <input type="text" value="{{old('surnames',$user->surnames)}}"name="surnames" id="surnames" class="inputUpdateProfile" >
                    </div>

                    <div class="date_basic_information basicStyleDiv">
                        <h1>Fecha de nacimiento:</h1>
                        <input type="date" value="{{old('birthdate',$user->birthdate)}}" name="birthdate" id="birthdate"class="inputUpdateProfile" >
                    </div>

                    <div class="gender_basic_information basicStyleDiv">
                        <h1>Region:</h1>
                        <input type="text" value="{{old('region',$user->region)}}"name="region" id="region" class="inputUpdateProfile" >
                    </div>

                    <div class="gender_basic_information basicStyleDiv">
                        <h1>Ciudad:</h1>
                        <input type="text" value="{{old('city',$user->city)}}"name="city" id="city" class="inputUpdateProfile" >
                    </div>

                </div>
            <!------------------------------------------------------------------------------------------------------------>


            <!------------------------------------------------------------------------------------------------------------>
            <!--Card ( EDITAR INFORMACION DE CONTACTO )-->    
            <div class="informationContactSection">

                    <div class="textTitleInformation">
                        <h1>Información de contacto</h1>
                    </div>

                    <div class="email_contact_information basicStyleDiv">
                        <h1>Email:</h1>
                        <input type="text" value="{{old('email',$user->email)}}"name="email" id="email"class="inputUpdateProfile" >
                        @if ($errors->has('email'))
                            <span class="error text-danger" for='input-email'>{{$errors->first('email')}}</span>  
                        @endif
                    </div>

                    <div class="telephone_contact_information basicStyleDiv">
                        <h1>Teléfono:</h1>
                        <input type="text" value="{{old('phone_number',$user->phone_number)}}"name="phone_number" id="phone_number" class="inputUpdateProfile" >
                        @if ($errors->has('phone_number'))
                            <span class="error text-danger" for='input-phone_number'>{{$errors->first('phone_number')}}</span>  
                        @endif
                    </div>

                </div>
            <!------------------------------------------------------------------------------------------------------------>
            

            <!------------------------------------------------------------------------------------------------------------>
            <!--Card ( EDITAR INFORMACION PERSONAL )-->   

                <div class="informationPrivateSection">
                    <div class="textTitleInformation">
                        <h1>Información Personal</h1>
                    </div>

                    <div class="type_document_private_information basicStyleDiv">
                        <h1>Tipo de documento:</h1>
                        <select name="type_document" class="form-select" id="type_document">
                                        
                            <option >{{$user->type_document}}</option>
                            <option value="Cédula de Extranjería">Cédula de extranjería</option>
                            <option value="Cédula de Ciudadanía">Cédula de ciudadanía</option>
                            <option value="Tarjeta de Identidad">Tarjeta de identidad</option>
                            
                        </select>
                    </div>

                    <div class="number_document_private_information basicStyleDiv">
                        <h1>Número de documento:</h1>
                        
                        <input type="text" value="{{old('document_number',$user->document_number)}}"name="document_number" id="document_number" class="inputUpdateProfile" >
                        @if ($errors->has('document_number'))
                            <span class="error text-danger" for='input-document_number'>{{$errors->first('document_number')}}</span>  
                        @endif
                    </div>

                </div>
      
            <!------------------------------------------------------------------------------------------------------------>


            <!------------------------------------------------------------------------------------------------------------>
            <!-- BOTONES-->
                <div>
                    <div class=" buttons-register">
                        <input type="button" onclick="confirmarCambiosUser()"class="button-register" value="Guardar cambios">
                        <a class="button-cancel "href="{{url('/profile'.$user->id)}}">Cancelar</a>
                    </div>
                </div>

        </form>
            
    </div>


@endsection