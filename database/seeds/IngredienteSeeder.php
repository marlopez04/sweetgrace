<?php

use Illuminate\Database\Seeder;

class IngredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredientes')->insert([
			'nombre'     => 'harina',
			'costo'     => '60',
			'cantidad'     => '3000',
			'stockcritico'     => '600'
			]);

        DB::table('ingredientes')->insert([
			'nombre'     => 'huevo',
			'costo'     => '20',
			'cantidad'     => '60',
			'stockcritico'     => '20'
			]);

        DB::table('ingredientes')->insert([
			'nombre'     => 'azucar',
			'costo'     => '20',
			'cantidad'     => '3000',
			'stockcritico'     => '600'
			]);
	}
}
