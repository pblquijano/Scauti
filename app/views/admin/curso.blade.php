@extends('layouts.admin')
@section('css')
@stop
@section('sidebar')
     @parent
    <a class="page-title">Cursos</a>
@stop
@section('content')
<div class="container">
    <br>
	<div class="row">
		<ul class="collection">
            @if(count($cursos)==0)
            <li class="collection-item center" >
                <strong>No hay cursos aún</strong>
            </li>
            @else                        
              @foreach($cursos as $curso)
                  <li class="collection-item avatar" id="li{{$curso->id}}">
                    {{ HTML::image($curso->img, 'Logo', array('class' => 'circle')) }}
                    
                    <h5 class=" teal-text" style="margin:0.5rem 0 0.656rem 0 !important;"><strong>{{$curso->nombre}}</strong></h5>
                    <p><strong>{{$curso->created_at}}</strong> <br>
                       {{$curso->descripcion}}
                    </p>
                    <div class="secondary-content">
                       @if ($curso->tipo > 0)
                          <a href="{{url('admin/curso/'.$curso->id.'/videos')}}" class="btn-floating  waves-effect waves-light purple tooltipped" data-position="bottom" data-delay="20" data-tooltip="Videos"><i class="material-icons">video_library</i></a>
                        @else
                         <a href="{{url('admin/curso/'.$curso->id.'/libros')}}" class="btn-floating  waves-effect waves-light pink tooltipped" data-position="bottom" data-delay="20" data-tooltip="Libros"><i class="material-icons">view_list</i></a>                     
                        @endif  
                      
                          <a class="btn-floating  waves-effect waves-light blue tooltipped" data-position="bottom" data-delay="20" data-tooltip="Editar"><i class="material-icons">create</i></a>
                          <a href="#modal-del" class="btn-floating  waves-effect waves-light red darken-2 tooltipped modal-trigger" data-position="bottom" data-delay="20" onclick="setid({{$curso->id}})" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                    </div>
                    
                  </li>
              @endforeach 
            @endif
          </ul>
	</div>
</div>

<div id="modal-add" class="modal modal-fixed-footer">
    {{ Form::open(array('id' => 'formNew', 'files' => true, 'method' => "post")) }}
   
        <div class="modal-content">
          <h4 class="teal-text">Agregar curso</h4>
          <div class="row">
                               
                <div class="input-field col s12">
                  <input id="nombre" name="nombre"  type="text" class="validate" >
                  <label for="nombre">Nombre</label>
                </div>
                <div class="input-field col s12">
                  <textarea id="desc" name="descripcion" class="materialize-textarea"></textarea>
                  <label for="desc">Descripción</label>
                </div>
                <div class="input-field col s12 m4">
                    {{ HTML::image('img/cursos/default.jpg', 'Logo', array('style' => 'width:100%; height: auto;')) }}
                </div>
                <div class="file-field input-field col s12 m8">
                  <div class="btn">
                    <span>Imagen</span>
                    {{ Form::file('file', ['name' =>'logo', 'accept' => 'image/jpg,image/jpeg,image/png'])}}
      
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate"  type="text" placeholder="Subir imágenes" >
                  </div>
                </div>
                <div class="switch right">
                        <label>
                          PDF
                          <input type="checkbox" checked="checked" id="tipo">
                          <span class="lever"></span>
                          Vídeo
                        </label>
                      </div>
                 <div class=" col s12">
                    <div class="right">
                      <input type="checkbox" class="filled-in" id="activo" checked="checked" />
                      <label for="activo">Activo</label>
                    </div>
                </div>
               
                
          </div>    
        </div>
        <div class="modal-footer">
            <button type="submit" id="btn-addCurso"  href="javascript:void(0);" class="btn modal-action waves-effect waves-light teal">Guardar</button>
          <input type="button" value="Cancelar" id="btn-cancelUser" onclick="closeModalAdd()" class="modal-action waves-effect waves-red btn-flat red-text"/>          
        </div>
    {{ Form::close() }}
</div>
<div id="modal-del" class="modal modal-fixed-footer">
    {{ Form::open(array('id' => 'formDel',  'method' => "post")) }}
   
        <div class="modal-content">
          <h4 class="teal-text">Eliminar curso</h4>
          <div class="row">
                       <p>¿Desea eliminar a este curso? No habrá marcha atras</p>                                                     
          </div>    
        </div>
        <div class="modal-footer">
            <button type="submit" id="btn-addCurso2"  href="javascript:void(0);" class="btn modal-action waves-effect waves-light teal">Eliminar</button>
          <input type="button" value="Cancelar" id="btn-cancelCurso2" onclick="closeModalDel()" class="modal-action waves-effect waves-red btn-flat red-text"/>          
        </div>
    {{ Form::close() }}
</div>
<div class="fixed-action-btn">
    <a href="#modal-add" class="btn-floating btn-large waves-effect  waves-light teal tooltipped modal-trigger" data-position="left" data-delay="50" data-tooltip="Agregar Curso"><i class="material-icons">add</i></a>
</div>		
@stop
@section('javascript')
<script src="{{ asset('js/adminCurso.js')  }}" type="text/javascript"></script>
@stop