<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <title>Scauti :: Administrador</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link href={{ asset('css/materialize.css') }} rel="stylesheet" type="text/css" />
      <link href={{ asset('css/toastr.css') }} rel="stylesheet" type="text/css" />
     <link href={{ asset('css/style.css') }} rel="stylesheet" type="text/css" />

     
</head>
@section('css') @show
<body class="teal lighten-5 grey-text text-darken-3">
    <header>      
      <nav class="top-nav teal">
        <div class="container">
          <div class="nav-wrapper"> @section('sidebar')
           
        @show</div>
        </div>
      </nav>
      <div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="mdi-navigation-menu"></i></a></div>
        <ul id="nav-mobile" class="side-nav fixed teal darken-1">
          <li class="logo"><a id="logo-container" href="" class="brand-logo">
            {{ HTML::image('img/logo.svg', 'Logo', array('id' => 'front-page-logo')) }}
            </a></li>
            <li class="bold"><a href="{{url('admin')}}" class="waves-effect waves-white white-text openlink"><i class="material-icons left">home</i>Inicio</a></li>
            <li class="bold"><a href="{{url('admin/cursos')}}" class="waves-effect waves-white white-text openlink"><i class="material-icons left">airplay</i>Cursos</a></li>
            <li class="bold"><a href="{{url('admin/usuarios')}}" class="waves-effect waves-white white-text openlink"><i class="material-icons left">people</i>Usuarios</a></li>
            <li class="bold"><a href="{{url('logout')}}" class="waves-effect waves-white white-text openlink"><i class="material-icons left">power_settings_new</i>Cerrar sesión</a></li>


        </ul>
    </header>
	   <main>
            	@yield('content')
    </main>
    <div id="mainloader" class="teal darken-1">
      <div id="progressbar" class="progress">
          <div class="indeterminate" ></div>
      </div>
    </div>     
    <script src="{{ asset('js/jquery-2.1.4.min.js')  }}" type="text/javascript"></script>
    <script src="{{ asset('js/materialize.js')  }}" type="text/javascript"></script>
    <script src="{{ asset('js/toastr.min.js')  }}" type="text/javascript"></script>
    <script src="{{ asset('js/main.js')  }}" type="text/javascript"></script>
    @section('javascript') @show 
</body>
</html>