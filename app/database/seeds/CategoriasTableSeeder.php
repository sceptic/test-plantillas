<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use AdminEventos\Entities\Categoria;

class CategoriasTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		Categoria::create([
			'id'=>1,
			'nombre'=>'futbol'
		]);
		Categoria::create([
			'id'=>2,
			'nombre'=>'motogp'
		]);
		Categoria::create([
			'id'=>3,
			'nombre'=>'toros'
		]);
		Categoria::create([
			'id'=>4,
			'nombre'=>'formula1'
		]);
		Categoria::create([
			'id'=>5,
			'nombre'=>'tenis'
		]);
	}

}