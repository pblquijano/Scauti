<?php

class UserController extends BaseController {


	public function getIndex()
	{
		
		switch (Auth::user()->tipo) {
				case 0:
					$users = User::all();
					return View::make('admin.user',array('users' => $users));
					break;
				
				case 2:
					return Redirect::to('inicio');
					break;
			}
	}
	public function getStats($id)
	{
		switch (Auth::user()->tipo) {
				case 0:
					$user  = User::find($id);
					$stats = User::find($id)->estadisticas;
					return View::make('admin.stats',array('stats' => $stats, 'user' => $user));
					break;
				
				case 2:
					return Redirect::to('inicio');
					break;
			}
		
	}
	public function addStats()
	{
		$stat = new Estadistica();
		$stat->creatividad = Input::get('test1')/10;	
		$stat->conocimiento = Input::get('test3')/10;		
		$stat->desempeño = Input::get('test6')/10;
		$stat->equipo = Input::get('test7')/10;
		$stat->mes = Input::get('mes');
		$stat->año = Input::get('ano');
		$stat->user_id = Input::get('iduser');
		$stat->observaciones = Input::get('obs');
		$stat->save();
	}
	public function postIndex()
	{
		$validator = Validator::make(
		    array(		        
		        'password' => Input::get('pass'),
		        'nombres' => Input::get('nombre'),
		        'apellido_p' =>  Input::get('apellido_p'),
		        'apellido_m' => Input::get('apellido_m'),
		        'email' => Input::get('email'),
		        'sexo' => Input::get('sexo'),
		        'activo' => Input::get('activo')
		        ),
		    array(
		        'password' => 'required|min:8',
		        'nombres' => 'required',
		        'apellido_p' =>  'required',
		        'apellido_m' => 'required',
		        'email' => 'required|email',		        
		        'sexo' => 'required',
		        'activo' => 'required'
		    )
		);
		if ($validator->fails()){
			$messages = $validator->messages();
			$array = [
			    "error" => 1,
			    "message" => $validator->messages(),
			];
			return Response::json($array);
		}else{
			$firstcasename =  "".Input::get('nombre');
			$user = new User();
			$user->username = $firstcasename[0]."".Input::get('apellido_p');
			$user->password =  Hash::make(Input::get('pass'));         
	         $user->nombres = Input::get('nombre');
	         $user->apellido_p = Input::get('apellido_p');
	         $user->apellido_m = Input::get('apellido_m');
	         $user->email = Input::get('email');
	         $user->celular = Input::get('celular');
	         $user->sexo = Input::get('sexo');
	         $user->tipo = 2;
	         $user->activo = Input::get('activo');
	         $user->save();
	         $array = [
			    "error" => 0,
			    "message" => $user,
			];         
	       	return Response::json($array);
		}
			
		
	}
	
	
}
?>
