@extends('layouts.cursante')
@section('css')
@stop

@section('content')
@section('sidebar')
     @parent
     <a href="javascript:void(0);" class="breadcrumb">
      @if(Auth::user()->img == "")
        {{ HTML::image('img/userdefault.jpg', 'Logo', array('class' => 'circle tinypro')) }} Bienvenido {{Auth::user()->nombres}}</a>
      @else
      {{ HTML::image(Auth::user()->img, 'Logo', array('class' => 'circle tinypro')) }} Bienvenido {{Auth::user()->nombres}}</a>
      @endif
@stop

	<div class="row">                        
           <div class=" col s12 m9">
              <div class="col s12">
                <div class="card  darken-1">
                  <div class="card-content">
                    <h3 class="teal-text no-margin">Top {{$date['month'].' '.$date['year']}}</h3>
                    <p></p>
                    <div class="row">
                      <div class="col s12 m12">
                        <div class="card teal darken-1 z-depth-2">
                          <div class="card-content white-text center">                            
                            <h4><i class="small material-icons">grade</i> Destacado</h4>
                            @if($best != null)
                              @if($best->img == "")
                              {{ HTML::image('img/userdefault.jpg', 'Logo', array('class' => 'circle mediumpro')) }}
                              @else
                              {{ HTML::image($best->img, 'Logo', array('class' => 'circle mediumpro')) }}
                              @endif
                              <p><strong>{{$best->username}}</strong></p>
                              <p>{{$best->nombres.' '.$best->apellido_p.' '.$best->apellido_m}}</p>
                            @endif
                          </div>                          
                        </div>
                      </div>
                      <div class="col s6 m3">
                        <div class="card orange darken-1 z-depth-2">
                          <div class="card-content white-text center">                            
                            <span class="card-title">Creatividad</span><br>
                            @if($cr != null)
                              @if($cr->img == "")
                              {{ HTML::image('img/userdefault.jpg', 'Logo', array('class' => 'circle mediumpro')) }}
                              @else
                              {{ HTML::image($cr->img, 'Logo', array('class' => 'circle mediumpro')) }}
                              @endif
                              <p><strong>{{$cr->username}}</strong></p>
                              <p>{{$cr->nombres.' '.$cr->apellido_p.' '.$cr->apellido_m}}</p>
                            @endif
                          </div>                          
                        </div>
                      </div>
                      <div class="col s6 m3">
                        <div class="card blue darken-1 z-depth-2">
                          <div class="card-content white-text center">                            
                            <span class="card-title">Conocimiento</span><br>
                            @if($co != null)
                              @if($co->img == "")
                              {{ HTML::image('img/userdefault.jpg', 'Logo', array('class' => 'circle mediumpro')) }}
                              @else
                              {{ HTML::image($co->img, 'Logo', array('class' => 'circle mediumpro')) }}
                              @endif
                              <p><strong>{{$co->username}}</strong></p>
                              <p>{{$co->nombres.' '.$co->apellido_p.' '.$co->apellido_m}}</p>
                            @endif
                          </div>                          
                        </div>
                      </div>
                      <div class="col s6 m3">
                        <div class="card brown darken-1 z-depth-2">
                          <div class="card-content white-text center">                            
                            <span class="card-title">Desempeño</span><br>
                            @if($de != null)
                             @if($de->img == "")
                              {{ HTML::image('img/userdefault.jpg', 'Logo', array('class' => 'circle mediumpro')) }}
                              @else
                              {{ HTML::image($de->img, 'Logo', array('class' => 'circle mediumpro')) }}
                              @endif
                              <p><strong>{{$de->username}}</strong></p>
                              <p>{{$de->nombres.' '.$de->apellido_p.' '.$de->apellido_m}}</p>
                            @endif
                          </div>                          
                        </div>
                      </div>
                      <div class="col s6 m3">
                        <div class="card red darken-1 z-depth-2">
                          <div class="card-content white-text center">                            
                            <span class="card-title">Equipo</span><br>
                            @if($eq != null)
                              @if($eq->img == "")
                              {{ HTML::image('img/userdefault.jpg', 'Logo', array('class' => 'circle mediumpro')) }}
                              @else
                              {{ HTML::image($eq->img, 'Logo', array('class' => 'circle mediumpro')) }}
                              @endif
                            <p><strong>{{$eq->username}}</strong></p>
                            <p>{{$eq->nombres.' '.$eq->apellido_p.' '.$eq->apellido_m}}</p>
                            @endif
                          </div>                          
                        </div>
                      </div>

                    </div>    


                  </div>           
                </div>
              </div>
           </div>

           <div id="mensajes" class="teal col s12 m3">
            <h4 class="center white-text">Mensajes</h4>
            <div id="collection">
            <ul class="collection no-margin">
              @for ($i = 0; $i < count($mensajes); $i++)
              <li class="collection-item">
                @if($mensajes[$i]->private == Auth::user()->id)
                  <h5>{{$mensajes[$i]->Titulo}}</h5>
                  <p class="no-margin"><strong>{{$mensajes[$i]->created_at}}</strong></p>
                  <p class="no-margin">{{$mensajes[$i]->cuerpo}}</p>
                @else
                  <h5>{{$mensajes[$i]->Titulo}}</h5>
                  <p class="no-margin"><strong>{{$mensajes[$i]->created_at}}</strong></p>
                  <p class="no-margin">{{$mensajes[$i]->cuerpo}}</p>                    
                @endif
              </li>
              @endfor
              
              
            </ul>
            </div>
              
           </div>                
	</div>



		
@stop
@section('javascript')
<script type="text/javascript"></script>
@stop