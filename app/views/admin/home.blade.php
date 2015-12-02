@extends('layouts.admin')
@section('css')
@stop

@section('content')
@section('sidebar')
     @parent
     <div class="col s12">

        <a href="javascript:void(0);" class=" page-title breadcrumb">Administrador</a>
     </div>
    
@stop

	<div class="row">                        
           <div class=" col s12 ">
              <div class="col s12">
                <div class="card ">
                  <div class="card-content">
                    <h3 class="teal-text">Top</h3>               
                  </div>           
                </div>
              </div>
           </div>
           <div class=" col s12 ">
              <div class="col s12">
                <div class="card  teal">
                  <div class="card-content">
                    <h3 class="white-text ">Mensajes</h3> 
                    <div id="collection2" class="row">
                      <ul class="collection">
                       
                        @for ($i = 0; $i < count($mensajes); $i++)
                        <li class="collection-item">
                            <h5>{{$mensajes[$i]->Titulo}}</h5>
                            <p class="no-margin"><strong>{{$mensajes[$i]->created_at}}</strong></p>
                            <p class="no-margin">{{$mensajes[$i]->cuerpo}}</p>
                         
                        </li>
                        @endfor
                  
                        
                      </ul>
                    </div>
                    <div class="center">
                        <a href="#modal-add" class="btn-floating btn-large waves-effect  waves-light white tooltipped modal-trigger" data-position="left" data-delay="50" data-tooltip="Agregar mensaje"><i class="teal-text material-icons">add</i></a>
                    </div>              
                  </div>           
                </div>
              </div>
           </div>
                          
	</div>
  <div id="modal-add" class="modal modal-fixed-footer">
    {{ Form::open(array('id' => 'formNew',  'method' => "post", 'enctype' => 'multipart/form-data')) }}
   
        <div class="modal-content">
          <h4 class="teal-text">Agregar mensaje</h4>
          <div class="row">
             
                <div class="input-field col s12">
                  <input id="titulo" name="titulo"  type="text" class="validate" >
                  <label for="titulo">Título</label>
                </div>
                <div class="input-field col s12">
                  <textarea id="mbody" name="mbody" class="materialize-textarea"></textarea>
                  <label for="mbody">Mensaje</label>
                </div>               
                
                  <div class="input-field col s12">
                    <select name="private" id="private">
                      <option value="0" >Todos</option>
                      @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->username}}</option>                      
                      @endforeach
                    </select>
                    <label>Para:</label>
                  </div>

                
          </div>    
        </div>
        <div class="modal-footer">
            <button type="submit" id="btn-add"  href="javascript:void(0);" class="btn modal-action waves-effect waves-light teal">Guardar</button>
          <input type="button" value="Cancelar" id="btn-cancel" onclick="closeModalAdd()" class="modal-action waves-effect waves-red btn-flat red-text"/>          
        </div>
    {{ Form::close() }}
</div>

		
@stop
@section('javascript')
<script src="{{ asset('js/adminHome.js')  }}" type="text/javascript"></script>
@stop