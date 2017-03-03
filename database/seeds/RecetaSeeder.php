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
			]);

        DB::table('recetas')->insert([
			'nombre'     => 'bombones2',
			'costo'     => '60',
			]);

        DB::table('recetas')->insert([
			'nombre'     => 'pandulce',
			'costo'     => '80',
			]);

        DB::table('recetas')->insert([
			'nombre'     => 'pandulce2',
			'costo'     => '120',
			]);

        DB::table('recetas')->insert([
			'nombre'     => 'tarta',
			'costo'     => '50',
			]);

        DB::table('recetas')->insert([
			'nombre'     => 'galletas',
			'costo'     => '20',
			]);

        DB::table('recetas')->insert([
			'nombre'     => 'budin',
			'costo'     => '30',
			]);
    }
}
