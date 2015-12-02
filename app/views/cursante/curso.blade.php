@extends('layouts.cursante')
@section('css')
@stop

@section('content')
@section('sidebar')
     @parent
     <a href="javascript:void(0);" class="breadcrumb">Cursos</a>
@stop
<div class="container"> 
<br> 
	<div class="row">                        
            @foreach($cursos as $curso)                
                <div class="col s6 m4 l3">
                  @if ($curso->tipo == 0)
                     <div  class="card col s12 red">
                  @else
                     <div  class="card col s12 teal">
                  @endif                 
                    <div class="card-image waves-effect waves-block waves-light">
                      {{ HTML::image($curso->img, 'Logo', array('class' => 'activator')) }}                      
                    </div>
                    <div class="card-content">
                      <span class="card-title activator white-text">{{$curso->nombre}}<i class="material-icons right" style="line-height: 48px;">more_vert</i></span>
                       @if ($curso->tipo == 0)
                          <p><a class="red-text text-lighten-4 openlink" href="{{url('cursos/'.$curso->id.'')}}" >Ir al curso</a></p>
                        @else
                          <p><a class="teal-text text-lighten-4 openlink" href="{{url('cursos/'.$curso->id.'')}}" >Ir al curso</a></p>
                        @endif 
                    </div>
                    <div class="card-reveal">
                      @if ($curso->tipo == 0)
                          <span class="card-title red-text">{{$curso->nombre}}<i class="material-icons right" >close</i></span>
                        @else
                          <span class="card-title teal-text">{{$curso->nombre}}<i class="material-icons right" >close</i></span>
                        @endif 
                      <p><p><strong>{{$curso->created_at}}</strong> <br>
                        {{$curso->descripcion}}</p>
                    </div>
                  </div>
                </div>
            @endforeach                       
	</div>
</div>


		
@stop
@section('javascript')
<script src="{{ asset('js/adminCurso.js')  }}" type="text/javascript"></script>
@stop