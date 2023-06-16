<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Libreria para iconos-->
    <script src="https://kit.fontawesome.com/1ec3c59459.js" crossorigin="anonymous"></script>
    <!-- Libreria fuentes de google-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
    <!-- cdn bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <!-- Logo de la aplicación-->
    <link rel="shortcut icon" href="{{url('assets/images/logo.png')}}">
    <title>Fundacion</title>
</head>

<body>


<main>
    @yield('content')
</main>

@yield('scripts')

    
<script src="{{url('assets/js/scripts.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite(['resources/css/app.css', 'resources/js/app.js'])

</body>
</html>