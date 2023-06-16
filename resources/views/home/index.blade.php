@extends('layouts.app-master')

@section('content')

    @can('viewAdmin', $user)

        <div class="containerTotalData">
            <div class="divTotalUsers styleDivTotalData">
                <div class="TitleTotalUsers styleTitleTotal">
                    <h1>Total Usuarios Registrados</h1>
                </div>
                <div class="DataTotalUsers styleDataTotalAll">
                    <div class="divIconTotalUsers divIconStyleGeneral">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <p>{{$totalUsers}}</p>
                </div>
            </div>

            <div class="divTotalActivities styleDivTotalData">
                <div class="TitleTotalActivities styleTitleTotal">
                    <h1>Total Actividades Creadas</h1>
                </div>
                <div class="DataTotalActivities styleDataTotalAll">
                    <div class="divIconTotalActivities divIconStyleGeneral">
                        <i class="fa-brands fa-think-peaks"></i>
                    </div>
                    <p>{{$totalActivities}}</p>
                </div>
            </div>
        </div>


            {{------------------------- INFORMACION DE LOS USUARIOS Y ACTIVDAD - ADMINISTRADOR ----------------------------------}}

        <div class="containerLideresInfo">

            {{---------------------------------------------------------------------------------------}}

            <div class="divTotalUsers styleDivDataLideres">
                <div class="TitleTotalUsers styleTitleTotal">
                    <h1>Líder con más actividades</h1>
                </div>
                <div class="DataTotalUsers styleDataTotalAll">
                    <div class="contentInfoUser">
                        @if ($userWithMostActivities)
                            <div class="pictureUser">
                                <a href="{{ url('user/'.$userWithMostActivities->id) }}">
                                    <img src="{{ asset('storage/images/users/'.$userWithMostActivities->image_profile) }}">
                                </a>
                            </div>
                    
                            <div class="infoUser">
                                <h1>{{ $userWithMostActivities->name . ' ' . $userWithMostActivities->surnames }}</h1>
                                <p>{{ $numActivities }} Actividades Realizadas</p>
                                
                            </div>
                        @else
                            <p class="NoInfoFound">No se encontraron actividades</p>
                        @endif
                    </div>
                    
                </div>
            </div>
            {{---------------------------------------------------------------------------------------}}

            <div class="divTotalUsers styleDivDataLideres">
                <div class="TitleTotalUsers styleTitleTotal">
                    <h1>Ultimo líder registrado</h1>
                </div>
                <div class="DataTotalUsers styleDataTotalAll">
                    <div class="contentInfoUser ">
                        @if ($latestUser)
                            <div class="pictureUser">
                                <a href="{{ url('user/'.$latestUser->id) }}">
                                    <img src="{{ asset('storage/images/users/'.$latestUser->image_profile) }}">
                                </a>
                            </div>
                    
                            <div class="infoUser">
                                <h1>{{ $latestUser->name . ' ' . $latestUser->surnames }}</h1>
                                <p>{{ $latestUser->created_at->diffForHumans() }}</p>
                            </div>

                        @else
                            <p class="NoInfoFound">No se encontraron Usuarios</p>
                        @endif
                    </div>
                </div>
            </div>

            {{---------------------------------------------------------------------------------------}}

            <div class="divTotalUsers styleDivDataLideres">
                <div class="TitleTotalUsers styleTitleTotal">
                    <h1>Ultima Actividad Realizada</h1>
                </div>
                <div class="DataTotalUsers styleDataTotalAll">
                    <div class="contentInfoUser ">
                        @if ($latestActivity)
                            <div class="pictureActivity">
                                <a href="{{ url('activity/'.$latestActivity->id) }}">
                                    <img src="{{ asset('storage/images/activities/'.$latestActivity->image_activity) }}">
                                </a>
                            </div>
                    
                            <div class="infoUser">
                                <h1>{{$latestActivity->type }}</h1>
                                <p>{{ $latestActivity->created_at->diffForHumans() }}</p>
                            </div>

                        @else
                            <p class="NoInfoFound">No se encontraron actividades</p>
                        @endif
                    </div>
                </div>
            </div>

        </div>

    @endcan


            {{------------------------- INFORMACION DE LOS USUARIOS Y ACTIVDAD - LIDERES -----------------------------------}}
    @can('viewLider', $user)

        <div class="containerLideresInfo">

            {{---------------------------------------------------------------------------------------}}

            <div class="divTotalUsers styleDivDataLideres">
                <div class="TitleTotalUsers styleTitleTotal">
                    <h1>Ultima actividad en la que colaboraste</h1>
                </div>
                <div class="DataTotalUsers styleDataTotalAll">
                    <div class="contentInfoUser">
                        @if ($latestUserActivity)
                            <div class="pictureActivity">
                                <a href="{{ url('activity/'.$latestUserActivity->activity_id) }}">
                                    <img src="{{ asset('storage/images/activities/'.$latestUserActivity->image_activity) }}">
                                </a>
                            </div>
                    
                            <div class="infoUser">
                                <h1>{{ $latestUserActivity->name}}</h1>
                                <p>{{ $latestUserActivity->type }}</p>
                                
                            </div>
                        @else
                            <p class="NoInfoFound">No has participado en actividades</p>
                        @endif
                    </div>
                    
                </div>
            </div>
            {{---------------------------------------------------------------------------------------}}

            <div class="divTotalUsers styleDivDataLideres">
                <div class="TitleTotalUsers styleTitleTotal">
                    <h1>Actividad con mas participantes</h1>
                </div>
                <div class="DataTotalUsers styleDataTotalAll">
                    <div class="contentInfoUser ">
                        @if ($activityWithMostParticipants)
                            <div class="pictureActivity">
                                <a href="{{ url('activity/'.$activityWithMostParticipants->id) }}">
                                    <img src="{{ asset('storage/images/activities/'.$activityWithMostParticipants->image_activity) }}">
                                </a>
                            </div>
                    
                            <div class="infoUser">
                                <h1>{{$activityWithMostParticipants->name }}</h1>
                                <p>Cantidad de participantes: {{ $activityWithMostParticipants->participants }}</p>
                            </div>

                        @else
                            <p class="NoInfoFound">No se encontraron Actividades</p>
                        @endif
                    </div>
                </div>
            </div>

            {{---------------------------------------------------------------------------------------}}

            <div class="divTotalUsers styleDivDataLideres">
                <div class="TitleTotalUsers styleTitleTotal">
                    <h1>Ultima Actividad Realizada</h1>
                </div>
                <div class="DataTotalUsers styleDataTotalAll">
                    <div class="contentInfoUser ">
                        @if ($latestActivity)
                            <div class="pictureActivity">
                                <a href="{{ url('activity/'.$latestActivity->id) }}">
                                    <img src="{{ asset('storage/images/activities/'.$latestActivity->image_activity) }}">
                                </a>
                            </div>
                    
                            <div class="infoUser">
                                <h1>{{$latestActivity->name }}</h1>
                                <p>{{ $latestActivity->created_at->diffForHumans() }}</p>
                            </div>

                        @else
                            <p class="NoInfoFound">No se encontraron actividades</p>
                        @endif
                    </div>
                </div>
            </div>

        </div>

    @endcan

                            {{------ CONTENEDOR GRAFICOS ACTIVIDADES -------}}

        <div class="ContainerGrafics">

            <div class="StyleContainerCanva">
                <div class="StyleTitleCanva">
                    <h1>Tipos de actividades</h1>
                </div>
                <canvas id="typeActivityGrafic"></canvas>
            </div>

            <div class="StyleContainerCanva">
                <div class="StyleTitleCanva">
                    <h1>Actividades por departamentos</h1>
                </div>
                <canvas id="regionActivityGrafic"></canvas>
            </div>
            
            <div class="StyleContainerCanva">
                <div class="StyleTitleCanva">
                    <h1>Actividades por ciudades</h1>
                </div>
                <canvas id="cityActivityGrafic"></canvas>
            </div>

            <div class="StyleContainerCanva" >
                <div class="StyleTitleCanva">
                    <h1>Menores de edad por Actividades</h1>
                </div>
                <canvas id="boysActivityGrafic"></canvas>
            </div>

        </div>

                            {{------ CONTENEDOR GRAFICOS LIDERES-------}}


        <div class="ContainerGraficsUsers">

            <div class="StyleContainerCanva" >
                <div class="StyleTitleCanva">
                    <h1>Menores por departamentos</h1>
                </div>
                <canvas id="YouthsRegionesGrafic"></canvas>
            </div>

    @can('viewAdmin', $user)

            <div class="StyleContainerCanva" >
                <div class="StyleTitleCanva">
                    <h1>Líderes por departamentos</h1>
                </div>
                <canvas id="UserRegionesGrafic"></canvas>
            </div>

            <div class="StyleContainerCanva" >
                <div class="StyleTitleCanva">
                    <h1>Líderes por Ciudades</h1>
                </div>
                <canvas id="UserCitiesGrafic"></canvas>
            </div>

        </div>

    @endcan

    <script type="text/javascript">

        const data = {!! json_encode($data) !!};
        const labelsRegion = {!! $labelsRegion !!};
        const totalRegion = {!! $totalRegion !!};
        const labelsCity = {!! $labelsCity !!};
        const totalCity = {!! $totalCity !!};
        const labelsType = {!! $labelsType !!};
        const totalType = {!! $totalType !!};
        const labelsRegionUsers = {!! $labelsRegionUsers !!};
        const totalRegionUsers = {!! $totalRegionUsers !!};
        const labelsCityUsers = {!! $labelsCityUsers !!};
        const totalCityUsers = {!! $totalCityUsers !!};
        const labelsYouths = {!! $labelsYouths !!};
        const totalBoys = {!! $totalBoys !!};
        const totalGirls = {!! $totalGirls !!};

    </script>

@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

