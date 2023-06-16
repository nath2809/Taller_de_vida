@extends('layouts.app-master')

@section('content')

    {{-- CONTENEDOR --}}
    <div class="containerViewProfileUser">

        {{-- DIV QUE CONTIENE LA FOTO Y EL NOMBRE DEL PERFIL--}}
        <div class="profileHeader">
            <div class="pictureUserHeader">
                <img src="{{asset('storage/images/users/'.$user->image_profile)}}" >
            </div>
            <div class="userInfo">

                <div class="Info">
                    <h1>{{$user->name ." ". $user->surnames}} </h1>
                    <p><i class="fa-solid fa-location-dot"></i> {{$user->city}}</p>
                </div>
            </div>
        </div>

        {{-- DIV QUE CONTIENE TODA LA INFORAMACION DEL USUARIO --}}
        <div class="titleDataUser">
            <h1>Informacion de {{$user->username}}</h1>
        </div>

        <div class="cardInfoUser">

            <div class="divDataUser">
                <label for="username">Nombre</label>
                <p name="username">{{$user->name}}</p>
            </div>

            <div class="divDataUser">
                <label for="username">Apellidos</label>
                <p name="username">{{$user->surnames}}</p>
            </div>

            <div class="divDataUser">
                <label for="username">Tipo de documento</label>
                <p name="username">{{$user->type_document}}</p>
            </div>

            <div class="divDataUser">
                <label for="username">Número de documento</label>
                <p name="username">{{$user->document_number}}</p>
            </div>

            <div class="divDataUser">
                <label for="username">Correo electrónico</label>
                <p name="username">{{$user->email}}</p>
            </div>

            <div class="divDataUser">
                <label for="username">Número de celular</label>
                <p name="username">{{$user->phone_number}}</p>
            </div>

            <div class="divDataUser">
                <label for="username">Región</label>
                <p name="username">{{$user->region}}</p>
            </div>

            <div class="divDataUser">
                <label for="username">Ciudad</label>
                <p name="username">{{$user->city}}</p>
            </div>

            <div class="divDataUser">
                <label for="username">Fecha de nacimiento</label>
                <p name="username">{{$user->birthdate}}</p>
            </div>

            <div class="divDataUser">
                <label for="username">Estado</label>
                <p name="username">{{$user->status}}</p>
            </div>
        </div>

        {{-- CARD QUE CONTIENE LAS ACTIVIDADES --}}
        <div class="CardActivitiesUser">

            {{-- DIV QUE CONTIENE LA INFO DE LAS ACTIVIDADES --}}
            <div class="divActivitiesUser">
                
                {{-- DIV QUE CONTIENE LAS ACTIVIDADES CREADAS POR EL USER --}}
                <div class="containerActivityUser">

                    {{-- CONDICIONAL POR SI NO HAY ACTIVIDADES CREADAS--}}
                    @if(count($activitiesAuthor->toArray()) <= 0)

                        <div class="divConditional">
                            <div class="titleInfoUser">
                                <h1>El líder no ha realizado actividades</h1>
                            </div>
                            
                            <div class="imgConditional">
                                <img src="{{url('assets/images/Empty.png')}}">
                            </div>
                        </div>

                    @else
                        
                        <div class="titleInfoUser">
                            <h1>Actividades realizadas por {{$user->username}}</h1>
                        </div>

                        @foreach ($activitiesAuthor as $activityAuthor )
                        <div class="contentInfo">
                            <div class="imgActivity">
                                <a href="{{url('activity/'.$activityAuthor->id)}}"><img src="{{asset('storage/images/activities/'.$activityAuthor->image_activity)}}"></a>
                            </div>
                            
                            <div class="InfoActivity">
                                <h1>{{$activityAuthor->name}}</h1>
                                <p>{{$activityAuthor->type}}</p>
                                <p>{{$activityAuthor->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
                
                {{-- DIV QUE CONTIENE LAS ACTIVIDADES EN LAS QUE PARTICIPO EL USER --}}
                <div class="containerActivityUser">

                    @if(count($participatedActivities->toArray()) <= 0)

                        <div class="divConditional">
                            <div class="titleInfoUser">
                                <h1>El líder no ha participado en actividades</h1>
                            </div>

                            <div class="imgConditional">
                                <img src="{{url('assets/images/Empty.png')}}">
                            </div>
                        </div>

                    @else

                        <div class="titleInfoUser">
                            <h1>{{$user->username }} Participo en</h1>
                        </div>
                    
                        @foreach ($participatedActivities as $participateActivity )
                        <div class="contentInfo">

                            <div class="imgActivity">
                                <a href="{{url('activity/'.$participateActivity->id)}}"><img src="{{asset('storage/images/activities/'.$participateActivity->image_activity)}}"></a>
                            </div>
            
                            <div class="InfoActivity">
                                <h1>{{$participateActivity->name}}</h1>
                                <p>{{$participateActivity->type}}</p>
                                <p>{{$participateActivity->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                        @endforeach

                    @endif
                </div>
                
            </div>
        </div>
    </div>

@endsection
