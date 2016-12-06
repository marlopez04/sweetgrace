<?php

use Illuminate\Database\Seeder;

class ListaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     		DB::table('listaprecios')->insert([
			'nombre'     => '12-2016',
			'vigencia_desde'    => '12-12-2016',
			'vigencia_hasta'    => '12-12-2016'
			]);
    }
}
