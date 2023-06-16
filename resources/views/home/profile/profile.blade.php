@extends('layouts.app-master')

@section('content')

<div class="containerInfoProfile">


@include('layouts.partials.message_success')

    <!------------------------------------------------------------------------------------------------------------>

    <!--Card ( INFORMACION BASICA )-->    
    <div class="informationContentSection">

        <div class="textTitleInformation basicInformation">
            <div class="textTitleDiv">
                <h1>Información básica</h1>
            </div>

            <div class="editProfileButton">
                <a href="{{url('edit_profile/'. auth()->User()->id)}}"><button>Editar datos</button></a>
            </div>
        </div>
                
                <div class="pictureUserSection">
                    <div class="PictureUserDiv">
                        <img src="{{asset('storage/images/users/' . auth()->user()->image_profile)}}" alt="">
                    </div>
                </div>

                <div class="name_basic_information basicStyleDiv">
                    <h1>Nombre:</h1>
                    <h2>{{auth()->User()->name}}</h2>
                </div>

                <div class="name_basic_information basicStyleDiv">
                    <h1>Apellidos:</h1>
                    <h2>{{auth()->User()->surnames}}</h2>
                </div>
                
                <div class="date_basic_information basicStyleDiv">
                    <h1>Fecha de nacimiento:</h1>
                    <h2>{{auth()->User()->birthdate}}</h2>
                </div>
                
                <div class="data_basic_information basicStyleDiv">
                    <h1>Región:</h1>
                    <h2>{{auth()->User()->region}}</h2>
                </div>

                <div class="gender_basic_information basicStyleDiv">
                    <h1>Ciudad:</h1>
                    <h2>{{auth()->User()->city}}</h2>
                </div>

            </div>

        
        <!------------------------------------------------------------------------------------------------------------>
        

        <!--Card ( INFORMACION DE CONTACTO )-->
        <div class="informationContactSection">

            <div class="textTitleInformation">
                <h1>Información de contacto</h1>
            </div>

            <div class="email_contact_information basicStyleDiv">
                <h1>Email:</h1>
                <h2>{{auth()->User()->email}}</h2>
            </div>

            <div class="telephone_contact_information basicStyleDiv">
                <h1>Teléfono:</h1>
                <h2>{{auth()->User()->phone_number}}</h2>
            </div>

        </div>
        <!------------------------------------------------------------------------------------------------------------>


        <!--Card ( INFORMACION PERSONAL )-->
        <div class="informationPrivateSection">
            <div class="textTitleInformation">
                <h1>Información Personal</h1>
            </div>

            <div class="type_document_private_information basicStyleDiv">
                <h1>Tipo de documento:</h1>
                <h2>{{auth()->User()->type_document}}</h2>
            </div>

            <div class="number_document_private_information basicStyleDiv">
                <h1>Número de documento:</h1>
                <h2>{{auth()->User()->document_number}}</h1>
            </div>

        </div>
        <!------------------------------------------------------------------------------------------------------------>
            
    </div>

@endsection

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>