@extends('layouts.admin')
@section('css')
<link href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" rel="stylesheet">
@stop
@section('sidebar')
     @parent
      <div class="col s12">
       <a href="{{url('admin/usuarios')}}" class="openlink page-title breadcrumb">Usuarios</a>
        <a href="javascript:void(0);" class=" page-title breadcrumb">Estadísticas</a>
     </div>
    
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
                          <th>Creatividad</th>
                          <th>Conocimiento</th>
                          <th>Desempeño</th>                          
                          <th>Equipo</th>                          
                          <th>Fecha</th>
                          <th>acciones</th>                   
                      </tr>
                  </thead>     
                  <tbody>
                       @foreach($stats as $stat)
                      <tr>
                          <td>{{$stat->creatividad}}</td>
                          <td>{{$stat->conocimiento}}</td>                          
                          <td>{{$stat->desempeño}}</td>
                          <td>{{$stat->equipo}}</td>
                          <td>{{$stat->mes." ".$stat->año}}</td>                          
                          <td>     
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
    {{ Form::open(array('id' => 'formNew', 'method' => "post")) }}
   
        <div class="modal-content">
          <h4 class="teal-text">Agregar estadística</h4>
          <input id="iduser" name="iduser"  type="hidden" value="{{$user->id}}" >
          <div class="row">
                 <div class="input-field col s12 m4">
                  <label>Creatividad</label>
                </div>
                <div class="input-field col s12 m8">
                  <p class="range-field">
                    <input type="range" id="test1" name="test1" min="0" max="50" />
                  </p>
                </div>                                   
                <div class="input-field col s12 m4">
                  <label>Conocimiento</label>
                </div>
                <div class="input-field col s12 m8">
                  <p class="range-field">
                    <input type="range" id="test3" name="test3" min="0" max="50" />
                  </p>
                </div> 
                
                <div class="input-field col s12 m4">
                  <label>Desempeño</label>
                </div>
                <div class="input-field col s12 m8">
                  <p class="range-field">
                    <input type="range" id="test6" name="test6" min="0" max="50" />
                  </p>
                </div> 
                <div class="input-field col s12 m4">
                  <label>Equipo</label>
                </div>
                <div class="input-field col s12 m8">
                  <p class="range-field">
                    <input type="range" id="test7" name="test7" min="0" max="50" />
                  </p>
                </div>
                <div class="input-field col s8">
                    <select name="mes" id="mes">                                         
                      <option value="1">Enero</option>
                      <option value="2">Febrero</option>
                      <option value="3">Marzo</option>
                      <option value="4">Abril</option>
                      <option value="5">Mayo</option>
                      <option value="6">Junio</option>
                      <option value="7">Julio</option>
                      <option value="8">Agosto</option>
                      <option value="9">Septiembre</option>
                      <option value="10">Octubre</option>
                      <option value="11">Noviembre</option>
                      <option value="12">Diciembre</option>
                                            
                    </select>
                    <label>Para:</label>
                  </div> 
                <div class="input-field col s4">
                  <input id="ano" name="ano"  type="number" class="validate" >
                  <label for="ano">Año</label>
                </div>
                <div class="input-field col s12">
                  <textarea id="obs" name="obs" class="materialize-textarea"></textarea>
                  <label for="obs">Observaciones</label>
                </div>  
               
                
          </div>    
        </div>
        <div class="modal-footer">
            <button type="submit" id="btn-add"  href="javascript:void(0);" class="btn modal-action waves-effect waves-light teal">Guardar</button>
          <input type="button" value="Cancelar" id="btn-cancel" onclick="closeModalAdd()" class="modal-action waves-effect waves-red btn-flat red-text"/>          
        </div>
    {{ Form::close() }}
</div>

<div class="fixed-action-btn">
    <a href="#modal-add" class="btn-floating btn-large waves-effect  waves-light teal tooltipped modal-trigger" data-position="left" data-delay="50" data-tooltip="Agregar Estadistica"><i class="material-icons">add</i></a>
</div>		
@stop
@section('javascript')
<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="{{asset('js/adminStats.js')}}" type="text/javascript"></script>
@stop