<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

.select{
}
h4 {
  color:#fff;
  font-family: 'Roboto', sans-serif;
  text-align:center;
}

h1 {
  color:#fff;
  font-family: 'Roboto', sans-serif;
  text-align:center;
}
/* Módulos contenido */
.row-fluid {
  
    background: -webkit-linear-gradient(175deg, rgb(246, 246, 246), rgb(183, 183, 183));
  background: linear-gradient(175deg, rgb(246, 246, 246), rgb(183, 183, 183));
}
.col-sm {
      min-height:250px;
    margin:3px;
 }
    .col-sm:nth-child(1) {
      background-color: #bdbdbd; 
  }
    .col-sm:nth-child(2) {
      background-color: #e0e0e0; 
    }
    .col-sm:nth-child(3) {
      background-color: #f5f5f5; 
    }
    .col-sm:nth-child(4) {
      background-color: #fafafa; 
}
.tintar {
    height:280px;
  background: linear-gradient(
    rgba(144, 144, 144, 1),
    rgba(0, 0, 0, .0)), url("{{asset('images/Cosecha.jpg')}}")  center / cover;
  
   
  padding: 2.9em;
}
.margin{
    margin-right:15px;
}



    /*================================================================================================== */
    .card label{
        font: oblique bold 120% cursive;
    }
    .card{
        text-align:center;
        
    }
    
    .btn-whatsapp {
        display:block;
        width:70px;
        height:70px;
        color:#fff;
        position: fixed;
        right:20px;
        bottom:20px;
        border-radius:50%;
        line-height:80px;
        text-align:center;
        z-index:999;
}
.tamno{
    min-height:170px;
    max-height:170px;
    max-width:300px;

}
#sidebar{
   background: black;  
    /*height: 100%;*/
    height: var(--atura-almacen);
    width:20%;
    transition: all 500ms linear;
    
}
#sidebar.active{
    margin-left:-19%;
}

#sidebar ul li{
    color: rgba(230, 230, 230, .9);
    text-align: center;
    padding: 15px 10px;
    list-style: none;
    border-bottom: 1px solid rgba(100,100,100,.3);
}
#toggle-btn{
    position: absolute;
    left: 230px;
    top: 20px;
    transition: all 500ms linear;
    cursor: pointer;
}

#toggle-btn span{
    display: block;
    width: 40px;
    text-align: center;
    font-size: 30px;
    border: 1px solid black; 
}
#activador{
    cursor: pointer;
    display: block;
    width: 40px;
    text-align: center;
    font-size: 30px;
    border: 1px solid black; 
}
#toggle-btn.active {
    left:15px;
    background:#777;
  }
  .desplegar{
      height: 100%;
    overflow-y: scroll;
  }
  .desplegar::-webkit-scrollbar{
      width: 6px;
  }
  .desplegar::-webkit-scrollbar-thumb{
      background: #414141;
  }
  .desplegar a{
    color: white;
   
  }
  a:hover{
     color:white;
     
  }
  body{
    -altura-almacen: 100%;
    -ancho-almacen: 80%;
  }
  .mvp{
      width:80%;
      height:100%;
  }




  



    /*.card input{
        margin-left: 180px; jajajaja
    }*/
    </style>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
 
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="row tam">
@guest 
@else
<div id="sidebar" class="active">
            <div class="desplegar">
            <ul>
             @if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista'))
             <li><a href="{{route('pilon.gerentes')}}">Reportes</a></li>
             @endif
             @if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Pilonero')||@Auth::user()->hasRole('Sub-Pilonero'))
            <li> <a href="{{route('pilon.index')}}">Pilones</a></li>
            @endif
            @if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista')||@Auth::user()->hasRole('Sub-Admin'))
            <li> <a href="{{route('fincas.index')}}">Fincas</a></li>
            @endif
            @if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista')||@Auth::user()->hasRole('Sub-Admin'))
            <li> <a href="{{route('variedad.index')}}">Variedad</a> </li>
            @endif
            @if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista')||@Auth::user()->hasRole('Sub-Admin'))
            <li> <a href="{{route('tipoclase.index')}}">Clases</a></li>
            @endif
            @if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista')||@Auth::user()->hasRole('Pilonero'))
            <li><a href="{{route('ubicacion.index')}}">Ubicacion</a></li>
            @endif
            @if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista'))
            <li><a href="{{route('procedencia.index')}}">Sucursales</a></li>
            @endif
            @if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista'))
            <li><a href="{{route('Textura.index')}}">Texturas</a></li>
            @endif
            @if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista'))
            <li> <a href="{{route('verusuario.index')}}">Usuarios </a>          
            </li>
            @endif
            @if(@Auth::user()->hasRole('Admin'))
            <li>
            <a href="{{route('role.index')}}">Roles</a>
            </li>
            @endif
            @if(@Auth::user()->hasRole('Admin'))
            <li>
            <a href="{{asset('images/Manual.pdf')}}" target="_blank"> Manual de Usuario</a>
            </li>
      @endif
            </ul>
            </div>
 
            
            </div>
            @endguest


    <div id="app" class="mvp">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

            <span id="activador">&#9776;</span>
            <br>
                <a class="navbar-brand" href="{{ url('/home') }}">
                <img src="{{asset('images/logo.png')}}" alt="" style="width: 2rem">
                    {{ config('app.name', 'Laravel') }}
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('Inicio Sesión')) 
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesion') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('Registrar'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                            @endif
                        @else

                        @if (Route::has('home.menu')) 
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home.menu') }}">{{ __('Menu Principal') }}</a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
     
            @yield('content')

        
        </main>
    </div>
    
    @yield('js')
    <script>
  window.onload = function() {
  // Variable para controlar el botón
  let btn = document.getElementById('activador');

  // Variable para controlar el menú
  let side = document.getElementById('sidebar');

  // Agregar evento "onclick" al botón
  btn.addEventListener('click', function() {
    // Agregar o quitar clase "active" a botón y menú
    btn.classList.toggle('active');
    side.classList.toggle('active');
  });
}
    </script>


</body>


</html>

