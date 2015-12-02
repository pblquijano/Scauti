@extends('layouts.admin')
@section('css')
<link href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" rel="stylesheet">
@stop
@section('sidebar')
     @parent
    <a class="page-title">Usuarios</a>
@stop
@section('content')
<div class="container">
  <br>
  <div class="card">
    <div class="card-content">
      <div class="row">
           
            <div class="col s12">
                
                  <div class="input-field col s6 left">          
                    <input type="text" placeholder="Buscar..."  class="global_filter" id="global_filter">                              
                  </div>
                       
              <table id="example2" class="display" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>Username</th>
                          <th>Nombre</th>
                          <th>Tipo</th>                          
                          <th>Acciones</th>                
                      </tr>
                  </thead>     
                  <tbody>
                       @foreach($users as $user)
                      <tr>
                          <td>{{$user->username}}</td>
                          <td>{{$user->nombres." ".$user->apellido_p." ".$user->apellido_m}}</td>
                          <td>
                            <?php
                              $tipo = $user->tipo; 
                              if($tipo==2){
                                echo "Cursante";
                              }
                            ?>

                          </td>
                          <td>     
                                  <a href="{{url('admin/usuarios/'.$user->id.'/stats')}}" class="btn-floating openlink  waves-effect waves-light orange tooltipped" data-position="bottom" data-delay="20" data-tooltip="Estadísticas"><i class="material-icons">equalizer</i></a>                       
                                  <a class="btn-floating  waves-effect waves-light blue tooltipped" data-position="bottom" data-delay="20" data-tooltip="Editar"><i class="material-icons">create</i></a>
                                  <a class="btn-floating  waves-effect waves-light red tooltipped" data-position="bottom" data-delay="20" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                          </td>               
                      </tr>
                      @endforeach         
                     </tbody>
              </table>
            </div>
               
      </div>
      
    </div>
  </div>
  
</div>

<div id="modal-add" class="modal modal-fixed-footer">
    {{ Form::open(array('id' => 'formNew', 'files' => true, 'method' => "post")) }}
   
        <div class="modal-content">
          <h4 class="teal-text">Agregar usuario</h4>
          <div class="row">
                <div class="input-field col s12 m6">
                  <input id="pass" name="pass"  type="password" class="validate" >
                  <label for="pass">Password</label>
                </div>  
                 <div class="input-field col s12 m6">
                  <input id="cpass" name="cpass"  type="password" class="validate" >
                  <label for="cpass">Confirmar Password</label>
                </div>                                
                <div class="input-field col s12">
                  <input id="nombre" name="nombre"  type="text" class="validate" >
                  <label for="nombre">Nombres</label>
                </div>
                <div class="input-field col s12 m6">
                  <input id="apellido_p" name="apellido_p"  type="text" class="validate" >
                  <label for="apellido_p">Apellido paterno</label>
                </div>
                <div class="input-field col s12 m6">
                  <input id="apellido_m" name="apellido_m"  type="text" class="validate" >
                  <label for="apellido_m">Apellido materno</label>
                </div>
                 <div class="input-field col s12 m6">
                  <input id="email" name="email"  type="email" class="validate" >
                  <label for="email">E-mail</label>
                </div>
                <div class="input-field col s12 m6">
                  <input id="celular" name="celular"  type="text" class="validate" >
                  <label for="celular">Celular</label>
                </div>                
                <div class="switch right">
                        <label>
                          Femenino
                          <input type="checkbox" checked="checked" id="sexo">
                          <span class="lever"></span>
                          Masculino
                        </label>
                      </div>
                 <div class="input-field col s12">
                    <div class="right">
                      <input type="checkbox" class="filled-in" id="activo" checked="checked" />
                      <label for="activo">Activo</label>
                    </div>
                </div>
               
                
          </div>    
        </div>
        <div class="modal-footer">
            <button type="submit" id="btn-addUser"  href="javascript:void(0);" class="btn modal-action waves-effect waves-light teal">Guardar</button>
          <input type="button" value="Cancelar" id="btn-cancelUser" onclick="closeModalAdd()" class="modal-action waves-effect waves-red btn-flat red-text"/>          
        </div>
    {{ Form::close() }}
</div>

<div class="fixed-action-btn">
    <a href="#modal-add" class="btn-floating btn-large waves-effect  waves-light teal tooltipped modal-trigger" data-position="left" data-delay="50" data-tooltip="Agregar Usuario"><i class="material-icons">add</i></a>
</div>		
@stop
@section('javascript')
<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="{{asset('js/adminUser.js')}}" type="text/javascript"></script>
@stop