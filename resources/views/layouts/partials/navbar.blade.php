

<!----------------------------- NAVEGACION --------------------------------->

<nav>
    <div class="divLogoImage" onclick="openNav()">
        <img src="{{asset('storage/images/users/' . auth()->user()->image_profile)}}" alt="">
        <i class="fa-solid fa-arrow-left-long"></i>
    </div>
</nav>


<div id="mySidenav" class="sidenav">

    
    <a href="javascript:void(0)" id="closebtn" class="closebtn" onclick="closeNav()">&times;</a>
    
    <div class="divContentInfoUser">

        <div class="divLogoImageMenu">
            <img src="{{asset('storage/images/users/' . auth()->user()->image_profile)}}" alt="" >
        </div>

        <div class="PersonalInfo">
            <p>{{auth()->user()->name . " " . auth()->user()->surnames  }}</p>
            <p>{{auth()->user()->email}}</p>
        </div>

    </div>

    <div class="contentMenuNav">

        <div class="divInfo">
            <a href="{{url('/profile'.auth()->User()->id)}}"> <i class="fa-solid fa-user"></i> <span class="link-name">Perfil</span></a>
        </div>

        <div class="divInfo">
            <a href="/home"><i class="fa-solid fa-circle-nodes"></i> <span class="link-name">Gráficos</span></a>
        </div>

        @can('viewAdmin', auth()->user())

        <div class="divInfo">
            <a href="/users"> 
                <i class="fa-solid fa-users"></i>
                <span class="link-name">Líderes</span>
            </a>
        </div>

        @endcan

        <div class="divInfo">
            <a href="/activities"><i class="fa-solid fa-book-open-reader"></i> <span class="link-name">Actividades</span></a>
        </div>

        <div class="divInfo">
            <a href="/logout" class="lastIcon"><i class="fa-solid fa-right-from-bracket"></i> <span class="link-name">Cerrar sesión</span></a>
        </div>
    </div>

</div>

<div id="overlay"></div>







