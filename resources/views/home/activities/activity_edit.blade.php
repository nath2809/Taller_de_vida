@extends('layouts.app-master')

@section('content')

<div class="container-register-user-admin">
    <div class="container-card-register-user-admin">

        <!-- Card -->
        <div class="card-register-admin">

            <div class="titleCreateRegister">
                <h1>Estas editando la actividad</h1>
            </div>
        
            <!-- Contenido del formulario -->
            <form action="{{url('activity_edit/'.$activity->id)}}" method="POST" id="formEditActivity" enctype="multipart/form-data">
                @csrf
                {{method_field('PATCH')}}

                <div class="container-form">

                <!-- INPUT - FOTO DE LA ACTIVIDAD -->
                    <div class="form-group-register">
                        <label for="image_activity">¡Si quieres cambiar la portada, Selecciona una nueva!</label>
                        <input type="file" value="{{old('image_activity')}}"name="image_activity" id="image_activity" class="custom-file-input" >
                        
                        @if ($errors->has('image_activity'))
                            <span class="error text-danger" for='input-image_activity'>{{$errors->first('image_activity')}}</span>  
                        @endif
                    </div>

                <!-- INPUT - TIPO DE ACTIVIDAD -->
                    <div class="form-group-register">
                        <label for="type">Tipo de actividad</label>
                        <select name="type" class="form-select" id="type">
                            
                            <option selected>{{$activity->type}}</option>
                            <option value="Atencion Psicosocial">Atención Psicosocial</option>
                            <option value="Capacitacion">Capacitación</option>
                            <option value="Seminario">Seminario</option>
                            <option value="Taller">Taller</option>
                            <option value="Reunion Comunitaria">Reunión Comunitaria</option> 

                        </select>
                    
                    </div>
                        
               
                <!-- INPUT - NOMBRE DE LA ACTIVIDAD -->   
                    <div class="form-group-register">
                        <label for="document">Nombre de la actividad</label>
                        <input type="text" value="{{old('name',$activity->name)}}" name="name" id="name" class="inputs_register_user" >
                    </div>

                <!-- DIV QUE CONTIENE UN INPUT -->
                   <div class="form-group-register">
                    <label for="region">Departamento</label>
                    <select name="region" id="region" class="form-select">
                        <option value="{{old('region',$activity->region)}}">{{$activity->region}}</option>
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento['departamento'] }}">{{ $departamento['departamento'] }}</option>
                        @endforeach
                    </select>
                   </div>  

                <!-- DIV QUE CONTIENE UN INPUT -->
                   <div class="form-group-register">
                    <label for="city">Ciudad</label>
                        <select name="city" id="city" class="form-select">
                            <option value="{{old('city',$activity->city)}}" selected>{{ old('city', $activity->city) }}</option>
                        </select>
                   </div> 
                   
                    @section('scripts')
                        <script>
                            const ciudades = {!! json_encode($ciudades) !!};
                            loadCities(ciudades);
                        </script>
                    @endsection 

                <!-- INPUT - DESCRIPCION DE LA ACTIVIDAD -->
                    <div class="form-group-register">
                        <label for="description">Descripción sobre la actividad</label>
                        <input type="text" value="{{old('description', $activity->description)}}"name="description" id="description" class="inputs_register_user" >
                    </div>   

                <!-- INPUT - PARTICIPANTES DE LA ACTIVIDAD -->              
                    <div class="form-group-register">
                        <label for="participants">Participantes</label>
                        <input type="text" value="{{old('participants', $activity->participants)}}" name="participants" id="participants" class="inputs_register_user" >
                    </div>

                <!-- INPUT - CANTIDAD DE NINOS DE LA ACTIVIDAD -->
                    <div class="form-group-register">
                        <label for="boys">Cantidad de niños</label>
                        <input type="text" value="{{old('boys', $activity->boys)}}" name="boys" id="boys" class="inputs_register_user" >
                    </div>

                <!-- INPUT - CANTIDAD DE NINAS DE LA ACTIVIDAD -->
                    <div class="form-group-register">
                        <label for="girls">Cantidad de niñas</label>
                        <input type="text" value="{{old('girls', $activity->girls)}}" name="girls" id="girls" class="inputs_register_user" >
                    </div>

                <!-- INPUT - LISTA DE ASISTENCIA ACTIVIDAD -->
                    <div class="form-group-register">
                        <label for="attendance">Lista de asistencia</label>
                        <input type="file" value="{{old('attendance', $activity->attendance)}}" name="attendance" id="attendance" class="custom-file-input">
                        @if ($errors->has('attendance'))
                            <span class="error text-danger" for='input-attendance'>{{$errors->first('attendance')}}</span>  
                        @endif
                    </div>

                <!-- INPUT - REPORTE DE LA ACTIVIDAD -->
                    <div class="form-group-register">
                        <label for="report">Reporte</label>
                        <input type="file" value="{{old('report', $activity->report)}}" name="report" id="report" class="custom-file-input">
                        @if ($errors->has('report'))
                            <span class="error text-danger" for='input-report'>{{$errors->first('report')}}</span>  
                        @endif
                    </div>

                <!-- INPUT - FOTOS DE LA ACTIVIDAD -->
                    <div class="form-group-register">
                        <label for="pictures">Fotos de la actividad</label>
                        <input type="file" value="{{old('pictures')}}" name="pictures[]" id="pictures" class="custom-file-input" multiple>
                        @if ($errors->has('pictures'))
                            <span class="error text-danger" for='input-pictures'>{{$errors->first('pictures')}}</span>  
                        @endif
                    </div>

                </div>

                    <!-- BOTONES -->
                    <div>
                        <div class=" buttons-register">
                            <input type="button" onclick="confirmarCambiosActivity()"class="button-register" name="btn-register" value="Editar Actividad" id="boton">
                            <a class="button-cancel "href="/activities">Cancelar</a>
                        </div>
                    </div>

            </form>
        </div>
    </div>
</div>

@endsection

<script src="{{url('assets/js/scripts.js')}}"></script>