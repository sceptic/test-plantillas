<?php
namespace AdminEventos\Repositories;
use AdminEventos\Entities\Categoria;
use AdminEventos\Entities\Evento;

class EventoRepo{

	public static function fullEventos(){
		return Evento::with('Categoria')->get();
	}
}