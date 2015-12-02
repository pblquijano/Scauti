<?php

class HomeController extends BaseController {

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

	public function inicio()
	{		

			switch (Auth::user()->tipo) {
				case 0:
					return Redirect::to('admin');
					break;			
				case 2:								
					$date = getdate();			
					$mes = $date['mon'];
					$cr=null;$co=null;$de=null;$eq=null;		
					$year = $date['year'];
					$stat = Estadistica::where('mes', 'like', $mes)->where('año', 'like', $year)->orderBy('creatividad', 'DESC')->get();
					$stat2 = Estadistica::where('mes', 'like', $mes)->where('año', 'like', $year)->orderBy('conocimiento', 'DESC')->get();
					$stat3 = Estadistica::where('mes', 'like', $mes)->where('año', 'like', $year)->orderBy('desempeño', 'DESC')->get();
					$stat4 = Estadistica::where('mes', 'like', $mes)->where('año', 'like', $year)->orderBy('equipo', 'DESC')->get();
					$statf = Estadistica::where('mes', 'like', $mes)->where('año', 'like', $year)->get();
					if(count($stat)>0){
						$cr= User::find($stat[0]->user_id);
					}
					if(count($stat2)>0){
						$co= User::find($stat2[0]->user_id);
					}
					if(count($stat3)>0){
						$de= User::find($stat3[0]->user_id);
					}
					if(count($stat4)>0){
						$eq= User::find($stat4[0]->user_id);
					}
					$idf=0;
					$last=0;
					for ($i=0; $i < count($statf) ; $i++) {
						$sum= doubleval(''.$statf[$i]->creatividad)+doubleval(''.$statf[$i]->conocimiento); 
						if($sum>$last){
							$last=$sum;
							$idf = $statf[$i]->user_id;
						}
					}
					
					$best =User::find($idf);
					$mensajes = Mensaje::orderBy('id', 'DESC')->get();
				    return View::make('cursante.home',array('mensajes' => $mensajes, 'cr' => $cr, 'co' => $co, 'de' => $de, 'eq' => $eq, 'date' => $date, 'best' => $best));
				    break;
			}
	}


}
