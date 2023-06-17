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

    <link rel="https://tallerdevida-production.up.railway.app/assets/css/style.css">
    <link rel="https://tallerdevida-production.up.railway.app/assets/css/grafics.css">
    <!-- Logo de la aplicación-->
    <link rel="shortcut icon" href="https://tallerdevida-production.up.railway.app/assets/images/logo.png">

    <title>Fundación</title>
</head>

<body>
@include('layouts.partials.navbar')

<section class="dashboard">

    @yield('content')

</section>

@yield('scripts')

    

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>

<script src="https://tallerdevida-production.up.railway.app/assets/js/scripts.js"></script>
<script src="https://tallerdevida-production.up.railway.app/assets/js/grafics.js"></script>
</body>
</html>