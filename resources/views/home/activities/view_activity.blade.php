@extends('layouts.app-master')

@section('content')

    <!-------- CONTAINER VISUALIZAR TALLERES -------->
    <div class="container_visualizar_talleres">
        <section class="first-section">

            <!---- SECCION TOP ---->
            <div class="info-top">
                <div class="container-info-user">
                    <div class="picture_user">
                        <a href="{{url('user/'.$author->id)}}"><img src="{{asset('storage/images/users/'.$author->image_profile)}}"></a>
                    </div>
    
                    <div class="info-user-created_at">
                        <h1>{{ $author->name ."  ".  $author->surnames}}</h1>
                        <p>{{ $activity->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                
         
                {{-- BOTON AGREGAR LIDERES --}}

                @can('manageParticipants', $activity)

                <div class="button-add-collaborator">
                    <button id="boton-agregar-lideres">Agregar Participantes</button>
                </div>

                @endcan
       
                
                @include('layouts.partials.message_success')

                {{-- CARD MODAL - AGREGAR LIDERES --}}
                  <div id="modal-agregar-lideres" class="modalLideres">
                      <div class="modal-content">
                          <span class="closeLideres">&times;</span>
                          <h2>Agregar líderes participantes</h2>
                          <p>Estas invitando Lideres a <span class="highlight">{{$activity->name}}</span></p>
                          
                    <form method="POST" action="{{ route('activities.addParticipants', $activity->id) }}" id="formAddUserToActivity">
                        @csrf
                    
                        {{-- INPUT - AGREGAR LIDERES --}}
                        <div class="form-group"> 
                            <input type="text" class="form-control" id="participants" name="participants" autocomplete="off" placeholder="Ingresa el email del lider participante">
                        </div>
                    
                        <div class="form-group"> 

                            {{-- CONDICIONAL POR SI NO EXISTN REGISTROS --}}
                            @if(count($activity->users->toArray()) <= 0)

                            
                                <div class="divLabel">
                                    <label for="participants">No hay lideres participantes</label>
                                </div>

                                <div class="content-collaborator-Add">
                                    <img src="{{url('assets/images/NoCollaborators.png')}}" clas="imgNoCollaborators">
                                </div>

                            @else

                            {{-- DIV LIDERES PARTICIPANTES --}}
                            <div class="divLabel">
                                <label for="participants">Lideres participantes</label>
                            </div>

                            @foreach ($activity->users as $user)
                                <div class="content-collaborator">
                                    <div class="picture-collaborator">
                                        <a href="{{url('user/'.$user->id)}}">  <img src="{{asset('storage/images/users/'.$user->image_profile)}}"></a>
                                    </div>
                    
                                    <div class="info-collaborator">
                                        <h1>{{ $user->name ."  ".  $user->surnames}}</h1>
                                        <p>{{ $user->email }}</p>
                                    </div>
                                </div>
                                @endforeach

                            @endif
                        </div>
                    
                        <div class="buttonAddParticipant">
                            <button type="button" onclick="ValidateRegisterParticipant()" class="btn btn-primary">Invitar</button>
                        </div>
                    </form>
                    
                 </div>
                  </div>
                      
            </div>

            <!---- SECCION INFO SOBRE LA ACTIVIDAD ---->                
            <div class="container-divs-info">

                <!----- SECCION INFO CONTAINER IZQUIERDO ---->
                <div class="general-information">
                    <div class="title">
                        <p>{{ $activity->name }}</p>
                    </div>
                    <div class="description">
                        <p>{{ $activity->description }}</p>
                    </div>

                    <div class="image_activity">
                        <img src="{{asset('storage/images/activities/'.$activity->image_activity)}}" alt="{{ $activity->name }}" class="img" >
                    </div>

                    <div class="container-pictures">
                        <div class="title-pictures">
                            <h1>Fotografias </h1> <i class="fa-regular fa-images"></i>
                        </div>

                        <div class="pictures">
                            @foreach($images as $image)
                                <img src="{{ asset('storage/images/activities/'.$image->filename) }}" alt="{{ $activity->name }}" class="img" onclick="showImage('{{ asset('storage/images/activities/'.$image->filename) }}')" loading="lazy">
                            @endforeach
                        </div>
                    </div>
                </div>
    
                <!----- SECCION INFO CONTAINER DERECHO ----->
                <div class="info-activity">
                    <div class="GeneralInformation-title">
                        <h1>Informacion general </h1> <i class="fa-solid fa-circle-exclamation"></i>
                    </div>

                                <!-------------- CONTENEDOR DE LAS DESCARGAS ------------->

                    <div class="files-container">
                        <div class="TitleDownload-files">
                            <h1>Descargas </h1> <i class="fa-solid fa-circle-down"></i>
                        </div>

                        <div class="attendance">
                            <p>Asistencia</p>
                            @if ($activity->attendance)
                            <a href="{{ asset('storage/files/'.$activity->attendance) }}" download="{{ $activity->name }} - {{ $activity->attendance }}"><img src="{{url('assets/images/expediente.png')}}" alt=""></a>
                            @endif
                        </div>

                        <div class="report">
                            <p>Descargar Reporte</p>
                            @if ($activity->report)
                            <a href="{{ asset('storage/files/'.$activity->report) }}" download="{{ $activity->name }} - {{ $activity->report }}"><img src="{{url('assets/images/expediente.png')}}" alt=""></a>
                            @endif
                        </div>
                    </div>

                                <!-------------- CONTENEDOR DE LA INFORMACION DE LA ACTIVIDAD ------------->


                    <div class="InfoActivity-container">

                        <div class="TitleInfo-activity">
                            <h1>Datos de la actividad </h1> <i class="fa-regular fa-window-restore"></i>
                        </div>
                        <p>Tipo de Actividad : {{$activity->type}}</p>
                        <p>Departamento de realización : {{$activity->region}}</p>
                        <p>Ciudad de realización : {{$activity->city}}</p>
                        <p>Cantidad de participantes : {{$activity->participants}}</p>
                        <p>Cantidad de niñas: {{$activity->boys}}</p>
                        <p>Cantidad de niños : {{$activity->girls}}</p>

                    </div>

                                <!-------------- CONTENEDOR DE LOS COLABORADORES ------------->

                    <div class="collaborators-container">

                        {{-- CONDICIONAL POR SI NO HAY ACTIVIDADES CREADAS--}}
                        @if(count($collaborator->toArray()) <= 0)
                        
                        <div class="title-collaborators">
                            <h1>No hay participantes </h1> <i class="fa-solid fa-layer-group"></i>
                        </div>

                        <div class="content-collaborator">
                            <img src="{{url('assets/images/NoCollaborators.png')}}" clas="imgNoCollaborators">
                        </div>

                        @else

                        <div class="title-collaborators">
                            <h1>Lideres Participantes </h1> <i class="fa-solid fa-layer-group"></i>
                        </div>

                            @foreach ($collaborator as $collaborator)
                            <div class="content-collaborator">
                                <div class="picture-collaborator">
                                    <a href="{{url('user/'.$collaborator->id)}}">  <img src="{{asset('storage/images/users/'.$collaborator->image_profile)}}"></a>
                                </div>
                
                                <div class="info-collaborator">
                                    <h1>{{ $collaborator->name ."  ".  $collaborator->surnames}}</h1>
                                    <p>{{ $collaborator->email }}</p>
                                </div>


                                <!-- Botón de eliminar líder -->

                                @can('manageParticipants', $activity)
                                
                                <form action="{{ route('activity.removeParticipant', [$activity->id, $collaborator->id]) }}" method="POST" id="removeParticipantForm">
                                    @csrf
                                    @method('DELETE')

                                    <div class="divButtonRemoveParticipants">

                                        <button type="button" onclick="confirmDelete()"><i class="fa-solid fa-circle-minus"></i></button>
                                    </div>
                                </form>

                                @endcan

                            </div>
                            @endforeach
                    </div>

                    @endif
                </div>
            </div>
        </section>              
    </div>

@endsection
   

