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
Route::match(array('GET', 'POST'),'/eventos-tv/', 
	array('as' => 'eventos-index', 'uses' => 'EventosController@index'));


Route::match(array('GET', 'PUT'),'/editar-evento/{id}/', 
	array('as' => 'editar-evento', 'uses' => 'EventosController@edit'));


