<?php
use Parse\ParseFile;
use Parse\ParseObject;
use Parse\ParseQuery;
class AdminVideosController extends BaseController {

	
	public function verVideos($id)
    {
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del usuario que se desea buscar y se debe declarar en la ruta como un parámetro
        switch (Auth::user()->tipo) {
                case 0:
                    $curso = Curso::find($id);
                    $recursos = Curso::find($id)->recursos;
                    return View::make('admin.video', array('curso' => $curso, 'recursos' => $recursos));
                    break;
                
                case 2:
                    return Redirect::to('inicio');
                    break;
            }
        
    }
    public function postVideo()
	{   
        ini_set('max_execution_time', 300);   
        $userid = Auth::user()->id;
		$idcurso=Input::get('idcurso');
		$recurso = new Recurso();         
         $recurso->nombre = Input::get('nombre');
         $recurso->descripcion = Input::get('descripcion');
         //$file = Input::file('image');        
         $recurso->activo = Input::get('activo');
       
         $recurso->id_user =1;
         $recurso->id_curso =$idcurso;
         $recurso->save();
         $the_id = $recurso->id;

         $recurso = Recurso::find($the_id);
         $destinationPath = 'temp/';
         $file = Input::file('video');
        $filename = $userid."".$file->getClientOriginalName();
        Input::file('video')->move($destinationPath, $filename);
        $file = ParseFile::createFromFile($destinationPath."/".$filename, $filename);
         $file->save();
         $url = $file->getURL();       	
		 $recurso->URL = "".$url;
         $jobApplication = new ParseObject("recursos");
        $jobApplication->set("myid", $the_id);
        $jobApplication->set("res", $file);
        $jobApplication->save();
		 $recurso->save();
        File::delete($destinationPath."/".$filename);

       
	}
}
?>
