@extends('layouts.cursante')
@section('css')
@stop

@section('content')
@section('sidebar')
     @parent
     <a href="{{url('cursos')}}" class="breadcrumb">Cursos</a>
      <a href="javascript:void(0);" class="breadcrumb">{{$curso->nombre}}</a>
@stop
<div class="container"> 
<br> 
	<div class="row">                        
            <ul class="container collection with-header">
              <li class="collection-header teal white-text"><h4>Temas</h4></li>
               @if (count($recursos)==0)
                <li  class="collection-item center grey-text text-darken-2"><div>No hay videos disponibles</div></li>        
               @endif 
               <?php $cont=1;?>
               @foreach($recursos as $recurso)
                <li  class="collection-item"><div>{{$cont.".- ".$recurso->nombre}}<a href="{{url('cursos/'.$curso->id.'/video/'.$recurso->id)}}" class="openlink secondary-content"><i class="material-icons">send</i></a></div></li>        
                <?php ++$cont;?>
              @endforeach 
            </ul>                      
	</div>
</div>


		
@stop
@section('javascript')
@stop