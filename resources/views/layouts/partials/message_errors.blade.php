@if (isset($errors) && count($errors) > 0)

    @foreach ($errors->all() as $error)
            
        <div>
            <ul class="alert alert-danger">
                <li>{{$error}}</li>
            </ul>    
        </div>

    @endforeach
       
@endif

@if (session('error') == 'Inactive')

    <div>
        <ul class="alert alert-danger">
            <li>{{'Tu cuenta ha sido desactivada. Comunícate con el administrador para resolver tu situación.'}}</li>
        </ul>    
    </div>

@endif
