<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
| Te voy a recomendar una mejor manera de manejar tus rutas, el detalle con
 la forma en la que las estas manejando ahorita, es que tienes que declarar
 cada una de manera individual. Esta maneja es mejor
*/


Route::get('/', array('uses'=>'AuthController@index'));
Route::post('login', array('uses'=>'AuthController@postlogin'));

Route::group(array('before' => 'auth'), function()
{
    
	Route::get('admin/usuarios','UserController@getIndex');
	Route::post('admin/usuarios','UserController@postIndex');
	Route::get('admin/usuarios/{id}/stats','UserController@getStats');
	Route::post('admin/usuarios/{id}/stats','UserController@addStats');

	Route::post('admin/usuarios','UserController@postIndex');
	Route::get('inicio', 'HomeController@inicio');
	Route::get('admin', 'AdminController@inicio');	
	Route::post('mensaje', 'AdminController@agregarmsj');
	Route::get('cursos', 'CursoController@getcursos');
	Route::get('cursos/{id}/video/{rs}', array('uses'=>'CursoController@playVideo'));
	Route::get('cursos/{id}', array('uses'=>'CursoController@verVideos'));
	Route::get('admin/curso/{id}/videos', array('uses'=>'AdminVideosController@verVideos'));
	Route::post('admin/curso/', array('uses'=>'AdminVideosController@postVideo'));
    Route::get('logout', 'AuthController@logOut');
    Route::post('admin/cursos', array('uses'=>'AdminController@agregar'));
     Route::get('admin/cursos', array('uses'=>'AdminController@index'));
      Route::post('admin/cursos/eliminar', array('uses'=>'AdminController@eliminar'));

});



?>