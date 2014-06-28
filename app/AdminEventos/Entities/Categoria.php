<?php
namespace AdminEventos\Entities;

class Categoria extends \Eloquent {
	
	protected $fillable = ['nombre'];

	public function setUpdatedAtAttribute($value){}
	public function setCreatedAtAttribute($value){}
}