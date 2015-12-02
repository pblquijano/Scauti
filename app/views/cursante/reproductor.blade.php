@extends('layouts.cursante')
@section('css')
  <link href="{{ asset('css/videojs.css')  }}" rel="stylesheet">

@stop

@section('content')
@section('sidebar')
    @parent
    <a href="{{url('cursos')}}" class="breadcrumb">Cursos</a>
    <a href="{{url('cursos/'.$curso->id.'')}}" class="breadcrumb">{{$curso->nombre}}</a>
     <a href="javascript:void(0);" class="breadcrumb">{{$recurso->nombre}}</a>
@stop
<div class="container">
      <div class="row white-text no-margin">
        @for ($i = 0; $i < count($recursos); $i++)
            @if($recurso->id == $recursos[$i]->id)
              @if($i == 0)
                <a href="javascript:void(0);" class="grey darken-1 col s6 center pointer  " data-position="bottom" data-delay="50" data-tooltip="Este es el primero"><h5><i class="material-icons">skip_previous</i></h5></a>
                <a href="{{url('cursos/'.$curso->id.'/video/'.$recursos[$i+1]->id)}}" class="teal openlink col s6 center pointer tooltipped" data-position="bottom" data-delay="50" data-tooltip="Siguiente"><h5><i class="material-icons">skip_next</i></h5></a>
              @elseif (count($recursos) == ($i+1))
                <a href="{{url('cursos/'.$curso->id.'/video/'.$recursos[$i-1]->id)}}" class="teal openlink col s6 center pointer tooltipped" data-position="bottom" data-delay="50" data-tooltip="Anterior"><h5><i class="material-icons">skip_previous</i></h5></a>
                <a href="javascript:void(0);" class="grey darken-1  col s6 center pointer tooltipped " data-position="bottom" data-delay="50" data-tooltip="Este es el ultimo"><h5><i class="material-icons">skip_next</i></h5></a>
              @else
                <a href="{{url('cursos/'.$curso->id.'/video/'.$recursos[$i-1]->id)}}" class="openlink teal col s6 center pointer tooltipped" data-position="bottom" data-delay="50" data-tooltip="Anterior"><h5><i class="material-icons">skip_previous</i></h5></a>
                <a href="{{url('cursos/'.$curso->id.'/video/'.$recursos[$i+1]->id)}}" class="openlink teal  col s6 center pointer tooltipped" data-position="bottom" data-delay="50" data-tooltip="Siguiente"><h5><i class="material-icons">skip_next</i></h5></a>
              @endif
            @endif
        @endfor
        
      </div>
      <video id="my-video" class="video-js" controls preload="auto" width="100%" height="70vh"
      poster="{{ asset(''.$curso->img)  }}" data-setup="{}">

        <source src="{{ asset(''.$recurso->URL)  }}" type='video/mp4'>
        <source src="MY_VIDEO.webm" type='video/webm'>
        <p class="vjs-no-js">
          
        </p>
      </video>
      <div class="row">
        <div class="col s12">
          <div class="card  darken-1">
            <div class="card-content">
              <h3 class="teal-text no-margin">{{$recurso->nombre}}</h3>
              <p class="grey-text text-darken-3"><strong>{{$recurso->created_at}}</strong></p>
              <p class="grey-text text-darken-3">{{$recurso->descripcion}}</p>
            </div>           
          </div>
        </div>
      </div>
</div>


		
@stop
@section('javascript')
  <script src="http://vjs.zencdn.net/5.0.2/video.js"></script>
  

@stop