<?php

use Illuminate\Database\Seeder;

class MovimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movimientos')->insert([
			'detalle'       => 'prueba 1',
			'importe'     => '10000',
			'user_id'	=> '1',
			'tipo'		=> 'ingreso',
			'estado'	=> 'confirmado',
			'periodo'	=> '201701'
			]);

        DB::table('movimientos')->insert([
			'detalle'       => 'prueba 2',
			'importe'     => '500',
			'user_id'	=> '1',
			'tipo'		=> 'egreso',
			'estado'	=> 'confirmado',
			'periodo'	=> '201701'
			]);

        DB::table('movimientos')->insert([
			'detalle'       => 'prueba 3',
			'importe'     => '5000',
			'user_id'	=> '1',
			'tipo'		=> 'egreso',
			'estado'	=> 'confirmado',
			'periodo'	=> '201701'
			]);

        DB::table('movimientos')->insert([
			'detalle'       => 'prueba 4',
			'importe'     => '10000',
			'user_id'	=> '1',
			'tipo'		=> 'ingreso',
			'estado'	=> 'confirmado',
			'periodo'	=> '201701'
			]);    
    }
}
