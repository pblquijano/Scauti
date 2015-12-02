<?php

class AuthController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function logOut(){
		Auth::logout();
        return Redirect::to('/')
                    ->with('mensaje_error', 'Tu sesión ha sido cerrada.');
	}
	public function postlogin(){
		$userdata = array(
            'username' => Input::get('username'),
            'password'=> Input::get('password')
        );
         if(Auth::attempt($userdata, Input::get('activo', 0)))
        {
        	$array = array(
			    "error" => 0,
			    "tipo"=>Auth::user()->tipo,
			    "message" => "Iniciando Sesión"
			);
            return Response::json($array);
        }else{
        	$array = array(
			    "error" => 1,
			    "message" => "Datos erróneos"
			);
        	return Response::json($array);
        }
	}
	public function index()
	{	

 
		 if (Auth::check())
        {
            return Redirect::to('/admin/cursos');
        }
		return View::make('login.index');
	}

}
?>
