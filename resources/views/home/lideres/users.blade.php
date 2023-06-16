@extends('layouts.app-master')
@section('content')
                                    <!---------------- FILTROS -------------------->
                                                       
    <div class="containerFilters">

        <div class="containerFiltersTop">
            
            <!-- BOTON PARA AGREGAR UN NUEVO USUARIO-->
            <div class="addNewRegisterButton">
                <a href="/user_create"><button>Agregar Líder <i class="fa-solid fa-user-plus"></i></button></a>
            </div>
   
            <!-- GENERADOR DE REPORTES EN EXCEL-->
            <div class="reportDiv">
                <a href="/download_user?{{$requestQuery}}"><button>Generar Reporte <i class="fa-solid fa-cloud-arrow-down"></i></button></a>
            </div>

        </div>

        <!------------------------------------------------------------------------------------------------->
        <form id="form2" name="" method="GET" action="/users">

            <!-- CONTAINER FILTROS IZQUIERDA-->
            <div class="containerFiltersOption"> 

                <div class="TextFilter">
                    <p>Filtrar actividades por: </p>
                </div>

            <!------- FILTRO -> ESTADO DEL USUARIO ----->
                <div class="containerFilterSelect">
                    <label for="selectFilter">Estado </label>
                    <select class="selectFilter" name="status" id="status" value="{{old('status')}}">
                        <option value="">Todos</option>
                        <option value="active">Activo</option>
                        <option value="inactive">Inactivo</option>
                    </select>
                </div>

            <!------- FILTROS DATE --------->

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
        

            <!-- CONTAINER BUSCADOR -->

            <div class="containerSearch">

            <!----------- BUSCADOR ----------->
                <div class="searchDiv">
                    <input type="text" class="form-control"  id="search" name="search" value="{{old('search')}}" placeholder="Buscar nombre / Numero de documento">
                </div>
                    
            <!--------- BOTON DE BUSQUEDA --------->
                <div class="buttonSearchDiv">
                    <input type="submit" class="btn " value="Buscar">
                </div>                           
            </div>
        </form>
    </div>
        
<!------------------------------------------------------------------------------------------------------------>
        
        
    @include('layouts.partials.message_success')

                                        <!----------------- TABLA ------------------>

    <div class="containerTable">
        <table class="contentTable">

        <!-- CABEZERA DE LA TABLA -->
        <thead>
            <tr>
                <th>ID</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Tipo de documento</th>
                <th>Número de documento</th>
                <th>Email</th>
                <th>Estado</th>

                <th>Usuario creado en</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <!-- CUERPO DE LA TABLA -->

        <tbody>
                    
            <!-- CONDICIONAL POR SI NO SE ENCUENTRAN RESULTADOS -->
                @if (count($data) <= 0)
                    <tr>
                        <td colspan="10">No se encontraron resultados</td>
                    </tr>
                @else
                    <p class="ResultSearch">{{ $count }} Resultados encontrados </p>
                @endforelse
                    
            <!-- FOREACH QUE RECORRE TODOS LOS RESULTADOS Y LOS PINTA EN LA TABLA -->

            @foreach ($data as $datos )
                <tr>
                    <td>{{ $datos->id}}</td>
                    <td>
                    <a href="{{url('user/'.$datos->id)}}"><img class="imgProfileTable" src="{{asset('storage/images/users/'.$datos->image_profile)}}" ></a>
                    </td>
                    <td>{{ $datos->name }}</td>
                    <td>{{ $datos->surnames }}</td>
                    <td>{{ $datos->type_document }}</td>
                    <td>{{ $datos->document_number }}</td>
                    <td>{{ $datos->email }}</td>
                    <td>{{ $datos->status}}</td>
                    {{-- <td>{{ $datos->role_id }}</td> --}}
                    <td>{{ $datos->created_at }}</td>
                            
                                            <!-- BOTON DE EDITAR EL USUARIO -->
                            
                    <td class="buttons">
                        <a href="{{url('user_edit/'.$datos->id)}}"><div class="mod edit"><i class="fa-solid fa-pen-to-square"></i></div></a>
                    </td>
                </tr>      
            @endforeach
                
        </tbody>
    </table>

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
