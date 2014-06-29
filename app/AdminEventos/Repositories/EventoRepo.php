<?php
namespace AdminEventos\Repositories;
use AdminEventos\Entities\Categoria;
use AdminEventos\Entities\Evento;

class EventoRepo{

	public static function fullEventos(){
		return Evento::with('Categoria')->get();
	}


	public static function editarEvento($new_data){

		$evento = Evento::find($new_data['id']);
		$evento->update($new_data);
		$evento->save(); 

		$ahora = date("Y-m-d H:i:s");
		Evento::where('fecha_fin', '<', $ahora)->delete();

		return $evento;
	}

	public static function limpiarEventosPasados(){
		$ahora = date("Y-m-d H:i:s");
		Evento::where('fecha_fin', '>', $ahora)->delete();
	}


	
}