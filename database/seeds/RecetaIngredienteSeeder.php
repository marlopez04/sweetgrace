<?php

use Illuminate\Database\Seeder;

class RecetaIngredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recetaingredientes')->insert([
			'nombre'     => 'harina',
			'cantidad'     => '400',
			'ingrediente_id'     => '1',
			'receta_id'     => '1',
			'precio'     => '1'
			]);
    }
}
