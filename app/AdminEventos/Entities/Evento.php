<?php
namespace AdminEventos\Entities;
use AdminEventos\Entities\Categoria;
class Evento extends \Eloquent {
	protected $fillable = ['titulo','categoria_id','fecha','fecha_fin','id_evento'];
	public $timestamps = false;
	public function Categoria(){
		return $this->belongsTo('AdminEventos\Entities\Categoria');
	} 


	public function setUpdatedAtAttribute($value){}
	public function setCreatedAtAttribute($value){}
	
}