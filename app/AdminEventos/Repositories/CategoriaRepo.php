<?php
namespace AdminEventos\Repositories;
use AdminEventos\Entities\Categoria;
use AdminEventos\Entities\Evento;

class CategoriaRepo{

	public static function all(){
		return Categoria::all();
	}
}