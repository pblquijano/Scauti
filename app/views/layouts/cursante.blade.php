<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <title>Scauti :: Sistema de control de autoaprendizaje interno</title>
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
   <header style="padding-left:0px;">
    <nav>
      <div class="nav-wrapper teal">
        <a href="{{url('inicio')}}" class="brand-logo center openlink">{{ HTML::image('img/logo-l.svg', 'Logo', array('id' => 'logo_cursantes')) }}</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul  class="right hide-on-med-and-down">              
           <li><a class="openlink"  href="{{url('logout')}}"><i class="material-icons left">power_settings_new</i>Cerrar sesión</a></li> 
        </ul>
        <ul  class="left hide-on-med-and-down">
          <li><a class="openlink" href="{{url('inicio')}}"><i class="material-icons left">home</i>Inicio</a></li>   
          <li><a class="openlink" href="{{url('cursos')}}"><i class="material-icons left">view_module</i>Cursos</a></li>        
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a class="openlink" href="{{url('inicio')}}">Inicio</a></li>
          <li><a class="openlink" href="{{url('cursos')}}">Cursos</a></li>
          <li><a class="openlink" href="{{url('logout')}}">Cerrar sesión</a></li>           
        </ul>        
      </div>
    </nav>
  </header>
  <nav>
    <div class="nav-wrapper teal darken-2">
      <div class="container col s12">
        @section('sidebar')
           
        @show
      </div>
    </div>
  </nav>
	<div class="">
            	@yield('content')
    </div>
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