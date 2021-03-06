<?php

use Illuminate\Database\Seeder;

class InsumoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('insumos')->insert([
			'nombre'       => 'tartera baja',
			'cantidad'     => '100',
			'max'          => '1000',
			'stockcritico' => '350',
			'unidad'       => '1',
			'costo_u'      => '1.2'
			]);

        DB::table('insumos')->insert([
			'nombre'       => 'moños',
			'cantidad'     => '450',
			'max'          => '1000',
			'stockcritico' => '350',
			'unidad'       => '1',
			'costo_u'      => '1.5'
			]);

        DB::table('insumos')->insert([
			'nombre'       => 'bolsa camiseta',
			'cantidad'     => '710',
			'max'          => '1000',
			'stockcritico' => '350',
			'unidad'       => '1',
			'costo_u'      => '1.6'
			]);
    }
}
