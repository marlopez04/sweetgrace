<?php

use Illuminate\Database\Seeder;

class RecetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recetas')->insert([
			'nombre'     => 'bombones1',
			'costo'     => '120',
			'articulo_id'     => '1'
			]);

        DB::table('recetas')->insert([
			'nombre'     => 'bombones2',
			'costo'     => '60',
			'articulo_id'     => '2'
			]);

        DB::table('recetas')->insert([
			'nombre'     => 'pandulce',
			'costo'     => '80',
			'articulo_id'     => '3'
			]);

        DB::table('recetas')->insert([
			'nombre'     => 'pandulce2',
			'costo'     => '120',
			'articulo_id'     => '4'
			]);

        DB::table('recetas')->insert([
			'nombre'     => 'tarta',
			'costo'     => '50',
			'articulo_id'     => '5'
			]);

        DB::table('recetas')->insert([
			'nombre'     => 'galletas',
			'costo'     => '20',
			'articulo_id'     => '6'
			]);

        DB::table('recetas')->insert([
			'nombre'     => 'budin',
			'costo'     => '30',
			'articulo_id'     => '7'
			]);
    }
}
