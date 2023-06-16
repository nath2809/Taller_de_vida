@extends('layouts.auth-master')

@section('content')

<div class="ContainerError404">
    <div class="divLogoError404">
        <img src="{{url('assets/images/logo.png')}}" alt="">
    </div>

    <div class="divAllContentError404">
        <div class="SectionTextError404">
            <div class="TextWarningError404">
                <h1>¡Lo siento mucho!</h1>
                <p>Lo sentimos, no tienes permisos para acceder a esta página.</p>
            </div>

            <div class="reasonsWarningError404">
                <div class="titleReasonsError404">
                    <h1>Error 403 - Acceso denegado</h1>
                </div>
                <ul>
                    <li>Por favor, contacta con el administrador del sitio si crees que esto es un error.</li>
                </ul>
            </div>

            <div class="divButtonReturnHomeError404">
                <a href="/home"><button>Volver al inicio</button></a>
            </div>
        </div>



        <div class="SectionImageError404">
            <img src="{{url('assets/images/403Error.png')}}" alt="">
        </div>
    </div>
</div>

@endsection