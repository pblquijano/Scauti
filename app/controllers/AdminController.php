<?php
use Parse\ParseFile;
use Parse\ParseObject;
use Parse\ParseQuery;
class AdminController extends BaseController {


	public function index()
	{
		switch (Auth::user()->tipo) {
			case 0:
				$cursos = Curso::all();
				return View::make('admin.curso',array('cursos' => $cursos));
				break;
			
			case 2:
				return Redirect::to('inicio');
				break;
		}
		
		
	}
	public function agregar()
	{
		$userid = Auth::user()->id;
		$curso = new Curso();         
         $curso->nombre = Input::get('nombre');
         $curso->descripcion = Input::get('descripcion');
         //$file = Input::file('image');
        
         $curso->activo = Input::get('activo');
         $curso->tipo = Input::get('tipo');
         $curso->basefile = "";
         $curso->id_user =1;
         
         $curso->save();
         $the_id = $curso->id;
         $curso = Curso::find($the_id);
         
         $file = Input::file('logo');
		 $destinationPath = 'temp/';
		$filename = $userid."".$file->getClientOriginalName();
		Input::file('logo')->move($destinationPath, $filename);		 		 
		 $file = ParseFile::createFromFile($destinationPath."/".$filename, $filename);
		 $file->save();
		 $url = $file->getURL();
		 $curso->img = "".$url;
		 $jobApplication = new ParseObject("cursos");
		$jobApplication->set("myid", $the_id);
		$jobApplication->set("img", $file);
		$jobApplication->save();
		 $curso->save();
		 File::delete($destinationPath."/".$filename);

		
       
	}
	public function agregarmsj()
	{		
		$msj = new Mensaje();         
         $msj->Titulo = Input::get('titulo');
         $msj->cuerpo = Input::get('mbody');
         $msj->private = Input::get('private');
		 $msj->save();
	}
	public function inicio()
	{		

			switch (Auth::user()->tipo) {
				case 0:
					$mensajes = Mensaje::all();
					$users = User::where('tipo', '>', 0)->get();
				    return View::make('admin.home',array('mensajes' => $mensajes, 'users' => $users));
					break;
				
				case 2:
					return Redirect::to('inicio');
					break;
			}
			

	}
	public function eliminar(){
		$id = Input::get('id');
		$curso = Curso::find($id);
		$curso->delete();
		 $query = new ParseQuery("cursos");
		$query->equalTo("myid", 14);
		$results = $query->find();
		//echo "Successfully retrieved " . count($results) . " scores.";
		// Do something with the returned ParseObject values
		for ($i = 0; $i < count($results); $i++) {
		  $object = $results[$i];
		  $object->destroy();
		}
	}
	
	
}
?>
