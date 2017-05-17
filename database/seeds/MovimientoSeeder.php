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
			'periodo'	=> '201701',
			'relacion' => 'otro'
			]);

        DB::table('movimientos')->insert([
			'detalle'       => 'prueba 2',
			'importe'     => '500',
			'user_id'	=> '1',
			'tipo'		=> 'egreso',
			'estado'	=> 'confirmado',
			'periodo'	=> '201701',
			'relacion' => 'otro'
			]);

        DB::table('movimientos')->insert([
			'detalle'       => 'prueba 3',
			'importe'     => '5000',
			'user_id'	=> '1',
			'tipo'		=> 'egreso',
			'estado'	=> 'confirmado',
			'periodo'	=> '201701',
			'relacion' => 'otro'
			]);

        DB::table('movimientos')->insert([
			'detalle'       => 'prueba 4',
			'importe'     => '10000',
			'user_id'	=> '1',
			'tipo'		=> 'ingreso',
			'estado'	=> 'confirmado',
			'periodo'	=> '201701',
			'relacion' => 'otro'
			]);

        DB::table('movimientos')->insert([
			'detalle'       => 'prueba 5',
			'importe'     => '10000',
			'user_id'	=> '1',
			'tipo'		=> 'ingreso',
			'estado'	=> 'confirmado',
			'periodo'	=> '201702',
			'relacion' => 'otro'
			]);

        DB::table('movimientos')->insert([
			'detalle'       => 'prueba 6',
			'importe'     => '500',
			'user_id'	=> '1',
			'tipo'		=> 'egreso',
			'estado'	=> 'confirmado',
			'periodo'	=> '201702',
			'relacion' => 'otro'
			]);

        DB::table('movimientos')->insert([
			'detalle'       => 'prueba 7',
			'importe'     => '6000',
			'user_id'	=> '1',
			'tipo'		=> 'ingreso',
			'estado'	=> 'confirmado',
			'periodo'	=> '201703',
			'relacion' => 'otro'
			]);

        DB::table('movimientos')->insert([
			'detalle'       => 'prueba 8',
			'importe'     => '700',
			'user_id'	=> '1',
			'tipo'		=> 'egreso',
			'estado'	=> 'confirmado',
			'periodo'	=> '201703',
			'relacion' => 'otro'
			]);

        DB::table('movimientos')->insert([
			'detalle'       => 'prueba 9',
			'importe'     => '500',
			'user_id'	=> '1',
			'tipo'		=> 'egreso',
			'estado'	=> 'confirmado',
			'periodo'	=> '201704',
			'relacion' => 'otro'
			]);

        DB::table('movimientos')->insert([
			'detalle'       => 'prueba 10',
			'importe'     => '6000',
			'user_id'	=> '1',
			'tipo'		=> 'ingreso',
			'estado'	=> 'confirmado',
			'periodo'	=> '201704',
			'relacion' => 'otro'
			]);

        DB::table('movimientos')->insert([
			'detalle'       => 'prueba 11',
			'importe'     => '700',
			'user_id'	=> '1',
			'tipo'		=> 'egreso',
			'estado'	=> 'confirmado',
			'periodo'	=> '201704',
			'relacion' => 'otro'
			]);


    }
}
