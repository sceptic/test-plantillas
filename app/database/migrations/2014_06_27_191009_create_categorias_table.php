<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('eventosDB')->create('categorias', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('titulo');
			$table->string('id_evento')->nullable();
			$table->integer('categoria_id')->unsigned();

			$table->date('fecha');
			$table->date('fecha_fin');

			$table->foreign('categoria_id')->references('id')->on('categorias');
		});
	}




	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categorias');
	}

}
