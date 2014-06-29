<?php

use AdminEventos\Repositories\EventoRepo;
use AdminEventos\Repositories\CategoriaRepo;

class Eventos{

	public static function infoEventos(){
		
		$eventos=EventoRepo::fullEventos();
		$categorias=CategoriaRepo::all();

		return compact('eventos','categorias');
	}
}

