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
    rgba(0, 0, 0, .0)), url("{{asset('images/cosecha.jpg')}}")  center / cover;
  
   
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
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
            
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

</body>
</html>
