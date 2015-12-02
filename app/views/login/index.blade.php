@extends('layouts.master')
@section('css')
  
<link href={{ asset('css/validationEngine.jquery.css') }} rel="stylesheet" type="text/css" />
@stop

@section('content')
<div class=" no-pad-bot fullstate teal darken-1">
	<div class="container fullstate vertical-centered-text">
		<div class="row center">
			<img id="scautilogo" src="img/logo.svg" >
			<br>
			<a href="#modal-login"  class="waves-effect waves-light btn-large modal-trigger"><i class="material-icons right">airplay</i>Iniciar</a>
		</div>
	</div>
</div>	
<div id="modal-login" class="modal modal-fixed-footer" >
    {{ Form::open(array('id' => 'formNew', 'files' => true, 'method' => "post")) }}
   
        <div class="modal-content">
          <h4 class="teal-text">Iniciar sesión</h4>
          <div class="row">
                 <div class="input-field col s12">
                  <input id="username" name="username"  type="text" class="validate validate[required]" >
                  <label for="username">Username</label>
                </div>
                <div class="input-field col s12">
                  <input id="password" name="password"  type="password" class="validate validate[required]" >
                  <label for="password">Password</label>
                </div>                                   
                 <div class="input-field col s12">
                    <div class="right">
                      <input type="checkbox" class="filled-in" id="activo" name="activo" checked="checked" />
                      <label for="activo">Activo</label>
                    </div>
                </div>                               
          </div>    
        </div>
        <div class="modal-footer">
            <button type="submit" id="btn-login"  href="javascript:void(0);" class="btn modal-action waves-effect waves-light teal">Iniciar</button>
          <input type="button" value="Cancelar" id="btn-cancel" onclick="closeModalAdd()" class="modal-action waves-effect waves-red btn-flat red-text"/>          
        </div>
    {{ Form::close() }}
</div>	
<div id="myloader" class="teal darken-1">
	<div id="progressbar" class="progress">
      <div class="indeterminate" ></div>
  </div>
</div>
@stop
@section('javascript')
  <script src="{{ asset('js/jquery.validationEngine-es.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/jquery.validationEngine.js') }}" type="text/javascript"></script>
	<script src="{{asset('js/login.js')}}" type="text/javascript"></script>
@stop