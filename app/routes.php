<?php

/*
|-------------------------
| Home:
|-------------------------
*/
Route::get('/', function()
{
	return View::make('hello');
});

/*
|-------------------------
| Eventos:
|-------------------------
*/
Route::get('/gestion-eventos-landings/', 
	array('as' => 'eventos-index', 'uses' => 'EventosController@index'));

Route::get('/gestion-eventos-landings/{$categoria}', 
	array('as' => 'eventos-cat', 'uses' => 'EventosController@eventosCategoria'));

Route::get('/gestion-eventos-landings/{$evento}', 
	array('as' => 'eventos-cat', 'uses' => 'EventosController@evento'));


