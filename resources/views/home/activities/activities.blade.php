@extends('layouts.app-master')

@section('content')

                                                <!---------FILTROS -------->
    <!------------------------------------------------------------------------------------------------->

    <div class="containerFilters">
            <!-- BOTON PARA AGREGAR UN NUEVO USUARIO-->
        <div class="containerFiltersTop">
            <div class="addNewRegisterButton">
                <a href="/create_activity"><button>Agregar Actividad <i class="fa-solid fa-book-open-reader"></i></button></a>
            </div>

            <!-- GENERADOR DE REPORTES EN EXCEL-->
            
            <div class="reportDiv">
                <a href="/download_activity?{{$requestQuery}}"><button>Generar Reporte <i class="fa-solid fa-cloud-arrow-down"></i></button></a>
            </div>
        </div>

        <!--------------------------------------------------------------------------------------------->
        

        <form id="form2" name="" method="GET" action="/activities">
            <div class="containerFiltersOption"> 

                <div class="TextFilter">
                    <p>Filtrar actividades por: </p>
                </div>

                <!------- FILTRO -> TIPO DE ACTIVIDAD ----->
                <div class="containerFilterSelect">

                    <label for="selectFilter">Tipo: </label>
                    <select class="selectFilter" name="type" id="type">
                        <option value="">Todos</option>
                        <option value="Atencion Psicosocial">Atención Psicosocial</option>
                        <option value="Capacitacion">Capacitación</option>
                        <option value="Seminario">Seminario</option>
                        <option value="Taller">Taller</option>
                        <option value="Reunion Comunitaria">Reunión Comunitaria</option>
                    </select>
                </div>

                <!------- FILTRO -> FECHAS ----->
                <div class="dateFiltersGroup">
                    <div class="filterDate">
                        <label for="date">Desde: </label>
                        <input type="date" value="" name="start_date" id="start_date" class="inputs_register_user">
                    </div>

                    <div class="filterDate">
                        <label for="date">Hasta: </label>
                        <input type="date" value="" name="final_date" id="final_date" class="inputs_register_user">
                    </div>        
                </div>
            </div>

        <!----------------------------------------------------------------------------------------------->

            <div class="containerSearch">
                <!-- BUSCADOR-->
                <div class="searchDiv">
                    <input type="text" class="form-control" id="searchActivity" name="searchActivity" placeholder="Buscar nombre de la Actividad " value="">
                </div>
                <!-- BOTON DE BUSQUEDA-->
                <div class="buttonSearchDiv">
                    <input type="submit" class="btn " value="Buscar">
                </div>      
            </div>
        </form>
    </div>
        <!----------------------------------------------------------------------------------------------->

                                            <!---------------- TABLA ------------------>

       @include('layouts.partials.message_success')

    <div class="containerTable">
    <table class="contentTable">
        <thead>
            <tr>
                <th >Id</th>
                <th >Foto</th>
                <th> Tipo de Actividad</th>
                <th> Nombre </th>
                <th> Ciudad </th>
                <th> Participantes</th>
                <th> Fecha de creación </th>
                <th> Acciones</th>
            </tr>
        </thead>

        <tbody>







            <!-- CONDICIONAL POR SI NO SE ENCUENTRAN RESULTADOS -->
                @if (count($data) <= 0)
                    <tr>
                        <td colspan="10">No se encontraron resultados </td>
                    </tr>
                @else
                    <p class="ResultSearch">{{ $count }} Resultados encontrados </p>
                @endforelse


        @foreach ($data as $datos)
            
            <tr>
                <td>{{$datos->id}}</td>
                <td>
                    <a href="{{url('activity/'.$datos->id)}}"><img class="imgProfileTable" src="{{asset('storage/images/activities/'.$datos->image_activity)}}" ></a>
                </td>
                <td>{{$datos->type}}</td>
                <td>{{$datos->name}}</td>
                <td>{{$datos->city}}</td>
                <td>{{$datos->participants}}</td>
                <td>{{$datos->created_at}}</td>

                <!-- BOTONES DE EDITAR LA ACTIVIDAD -->

              <!-- BOTONES DE EDITAR LA ACTIVIDAD -->
                    
                <td class="buttons">
                    <a href="{{url('activity_edit/'.$datos->id)}}">  <div class="mod edit"><i class="fa-solid fa-pen-to-square"></i></div></a>
                </td>

            </tr>

        @endforeach
               
        </tbody>
    </table>

        <!-- BOTONES DE SALTO DE PAGINA -->
        <div class="buttonsNavegationPages">

            @if ($data->currentPage() > 1)
            <a href="{{ $data->url($data->currentPage() - 1) }}" >&laquo; Anterior</a>
            @endif
        
            <span>Página {{ $data->currentPage() }} de {{ $data->lastPage() }}</span>
        
            @if ($data->currentPage() < $data->lastPage())
            <a href="{{ $data->url($data->currentPage() + 1) }}" >Siguiente &raquo;</a>
            @endif
        </div>

    </div>

@endsection

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>