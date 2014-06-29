<?php
use AdminEventos\Entities\Evento;
use AdminEventos\Repositories\EventoRepo;
use Underscore\Types\Arrays;
use Underscore\Parse;
class EventosController extends \BaseController {

	public function __constructor(Evento $evento){
		$this->evento = $evento;
	}
	
	/**
	 * Listar eventos TV. Crear nuevos eventos
	 * GET-POST 
	 * /eventos-tv/
	 * 
	 * @return Response
	 */
	public function index()
	{
		if($input = Input::all())
		{
			$evento = Evento::create($input);
		}	

		$infoEventos = Eventos::infoEventos();
		extract($infoEventos);

		$dataView = compact('eventos','categorias','evento');
		Debugbar::info($dataView);
		return View::make("eventos/index",$dataView);
	}


	/**
	 * Show the form for editing the specified resource.
	 * GET|PUT /editar-evento/{id}/
	 *
	 */
	public function edit($id)
	{	
		$success = 0;
		if($input = Input::all())
		{
		  //Editar evento:
			$evento = EventoRepo::editarEvento($input);	
			$success = 1;
			
		}else{
			$evento = Evento::find($id);
		}	
		
		$infoEventos = Eventos::infoEventos();
		extract($infoEventos);

		$dataView = compact('eventos','categorias','evento');
		Debugbar::info($dataView);
		return View::make("eventos/edit",$dataView);
	}



	public  function limpiarEventosPasados(){
		 Evento::where('votes', '>', 100)->delete();
	}



	public function sendJSONT(){

		$infoEventos = Eventos::infoEventos();
		extract($infoEventos);
		
		$futbol = Arrays::filter($eventos->toArray(), function($i) {
    		return $i['categoria_id'] == 1; 
		});

		$json = json_encode($futbol);
		
		$array = json_decode($json, true);
		var_dump($array); exit();

	}


}