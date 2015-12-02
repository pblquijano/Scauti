@extends('layouts.admin')
@section('css')
<link href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" rel="stylesheet">
@stop
@section('sidebar')
     @parent
     <div class="col s12">
       <a href="{{url('admin/cursos')}}" class=" page-title breadcrumb">Cursos</a>
        <a href="javascript:void(0);" class=" page-title breadcrumb">{{$curso->nombre}}</a>
     </div>
@stop
@section('content')
<div class="container">
  <br>
  <div class="card">
    <div class="card-content">
      <div class="row">
        <div class="col s12">
          <ul class="tabs">            
            <li class="tab col s6"><a class="active" href="#vid">Vídeos</a></li>           
            <li class="tab col s6"><a href="#base">Basefile</a></li>
          </ul>
        </div>
        <div id="vid" class="col s12">
           <span class="card-title"><strong>Vídeos del curso {{$curso->nombre}}</strong></span> 
            <div class="row">
                
                  <div class="input-field col s6 left">          
                    <input type="text" placeholder="Buscar..."  class="global_filter" id="global_filter">                              
                  </div>
                       
              <table id="example" class="display" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>id</th>
                          <th>Nombre</th>
                          <th>Creado</th>
                          <th>Acciones</th>                
                      </tr>
                  </thead>     
                  <tbody>
                      <?php $cont=1;?>
                      @foreach($recursos as $recurso)
                      <tr>
                          <td><?php echo "".$cont; ++$cont;?></td>
                          <td>{{$recurso->nombre}}</td>
                          <td>{{$recurso->created_at}}</td>
                          <td>
                            <a href="curso/{{$curso->id}}/videos" class="btn-floating  waves-effect waves-light purple tooltipped" data-position="bottom" data-delay="20" data-tooltip="Videos"><i class="material-icons">video_library</i></a>
                                  <a class="btn-floating  waves-effect waves-light blue tooltipped" data-position="bottom" data-delay="20" data-tooltip="Editar"><i class="material-icons">create</i></a>
                                  <a class="btn-floating  waves-effect waves-light red tooltipped" data-position="bottom" data-delay="20" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                          </td>               
                      </tr>
                      @endforeach           
                     </tbody>
              </table>
            </div>
        </div>
        <div id="base" class="col s12">
          <span class="card-title"><strong>Archivos base del curso {{$curso->nombre}}</strong></span> 
        </div>       
      </div>
      
    </div>
  </div>
	
</div>
<div id="modal-add" class="modal modal-fixed-footer">
    {{ Form::open(array('id' => 'formNew2', 'files' => true, 'method' => "post", 'enctype' => 'multipart/form-data')) }}
   
        <div class="modal-content">
          <h4 class="teal-text">Agregar vídeo</h4>
          <div class="row">
              <input id="idcurso" name="idcurso"  type="hidden" value="{{$curso->id}}" >
                <div class="input-field col s12">
                  <input id="nombre" name="nombre"  type="text" class="validate" >
                  <label for="nombre">Nombre</label>
                </div>
                <div class="input-field col s12">
                  <textarea id="desc" name="descripcion" class="materialize-textarea"></textarea>
                  <label for="desc">Descripción</label>
                </div>               
                <div class="file-field input-field col s12">
                  <div class="btn">
                    <span>Video</span>
                    {{ Form::file('file', ['name' =>'video', 'id' =>'video', 'accept' => 'video/mp4'])}}
      
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate"  type="text" placeholder="Subir video" >
                  </div>
                </div>
                <div class=" col s12">
                    <div class="switch right">
                        <label>
                          Inactivo
                          <input type="checkbox" checked="checked" id="activo">
                          <span class="lever"></span>
                          Activo
                        </label>
                      </div>
                </div>
                
          </div>    
        </div>
        <div class="modal-footer">
            <button type="submit" id="btn-addVideo"  href="javascript:void(0);" class="btn modal-action waves-effect waves-light teal">Guardar</button>
          <input type="button" value="Cancelar" id="btn-cancelUser" onclick="closeModalAdd()" class="modal-action waves-effect waves-red btn-flat red-text"/>          
        </div>
    {{ Form::close() }}
</div>
<div class="fixed-action-btn">
    <a href="#modal-add" class="btn-floating btn-large waves-effect  waves-light teal tooltipped modal-trigger" data-position="left" data-delay="50" data-tooltip="Agregar Video"><i class="material-icons">add</i></a>
</div>		
@stop
@section('javascript')
<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="{{ asset('js/jquery.ui.widget.js')  }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.fileupload.js')  }}" type="text/javascript"></script>
<script src="{{ asset('js/adminVideo.js')  }}" type="text/javascript"></script>

@stop