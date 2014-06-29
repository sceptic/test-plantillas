<?php
namespace AdminEventos\Entities;

class Categoria extends \Eloquent {
	
	protected $fillable = ['nombre'];
	public $timestamps = false;

	public function Evento(){
		return $this->hasMany('AdminEventos\Entities\Evento');
	} 

	public function setUpdatedAtAttribute($value){}
	public function setCreatedAtAttribute($value){}
}