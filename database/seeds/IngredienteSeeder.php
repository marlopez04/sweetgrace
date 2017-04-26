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
			'nombre'       => 'harina',
			'cantidad'     => '3000',
			'max'          => '10000',
			'stockcritico' => '600',
			'unidad'       => '100',
			'costo_u'      => '1.5'
			]);

        DB::table('ingredientes')->insert([
			'nombre'       => 'huevo',
			'cantidad'     => '60',
			'max'          => '100',
			'stockcritico' => '20',
			'unidad'       => '1',
			'costo_u'      => '1.3'
			]);

        DB::table('ingredientes')->insert([
			'nombre'       => 'azucar',
			'cantidad'     => '3500',
			'max'          => '10000',
			'stockcritico' => '4000',
			'unidad'       => '100',
			'costo_u'      => '1.3'
			]);
	}
}
