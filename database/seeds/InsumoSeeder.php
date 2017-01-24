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
			'nombre'     => 'tartera baja',
			'costo'     => '120',
			'cantidad'     => '100',
			'stockcritico'     => '30'
			]);

        DB::table('insumos')->insert([
			'nombre'     => 'tartera baja',
			'costo'     => '120',
			'cantidad'     => '100',
			'stockcritico'     => '30'
			]);

        DB::table('insumos')->insert([
			'nombre'     => 'tartera baja',
			'costo'     => '120',
			'cantidad'     => '100',
			'stockcritico'     => '30'
			]);
    }
}
