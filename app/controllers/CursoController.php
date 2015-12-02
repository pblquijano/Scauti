<?php

class CursoController extends BaseController {

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

	   El pedp es que tu carpeta se llama Scauti we... y en tu localhost estabas poniendo scauti ... 
	   A windows le vale madre y trata de interpretarlo.... 
	|
	*/
	public function playVideo($id, $rs)
    {
    		switch (Auth::user()->tipo) {
				case 0:
					return Redirect::to('admin');
					break;
				
				case 2:
					$recursos = Curso::find($id)->recursos;
        			$recurso = Recurso::find($rs);
        			$curso = Curso::find($id);
        			return View::make('cursante.reproductor', array('curso' => $curso, 'recurso' => $recurso,'recursos' => $recursos));			
					break;
			}
    	
        // para buscar al usuario utilizamos el metido find que nos proporciona Laravel
        // este método devuelve un objete con toda la información que contiene un usuario

    }
	public function verVideos($id)
    {
    	switch (Auth::user()->tipo) {
				case 0:
					return Redirect::to('admin');
					break;
				
				case 2:
					$curso = Curso::find($id);        
        			$recursos = Curso::find($id)->recursos;       
    				return View::make('cursante.lista', array('curso' => $curso, 'recursos' => $recursos));				
					break;
			}

        
    }
	public function getcursos()
	{	
		switch (Auth::user()->tipo) {
				case 0:
					return Redirect::to('admin');
					break;
				
				case 2:
					$cursos = Curso::where('activo', '>', 0)->get();		
					return View::make('cursante.curso',array('cursos' => $cursos));					
					break;
			}

	}


}
