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
                <p>La página que busca no se encuentra</p>
            </div>

            <div class="reasonsWarningError404">
                <div class="titleReasonsError404">
                    <h1>Posibles razones</h1>
                </div>
                <ul>
                    <li>Es posible que la dirección se haya escrito incorrectamente.</li>
                    <li>Puede ser un enlace roto o desactualizado.</li>
                </ul>
            </div>

            <div class="divButtonReturnHomeError404">
                <a href="/home"><button>Volver al inicio</button></a>
            </div>
        </div>



        <div class="SectionImageError404">
            <img src="{{url('assets/images/404Error.png')}}" alt="">
        </div>
    </div>
</div>

@endsection