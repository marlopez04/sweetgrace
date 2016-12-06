<?php

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
			'nombre'     => 'bombones',
			'imagen'    => 'bombones.jpg'
			]);

        DB::table('categorias')->insert([
			'nombre'     => 'tartas',
			'imagen'    => 'tartas.jpg'
			]);

        DB::table('categorias')->insert([
			'nombre'    => 'pandulces',
			'imagen'    => 'pandulces.jpg'
			]);

        DB::table('categorias')->insert([
			'nombre'    => 'galletas',
			'imagen'    => 'galletas.jpg'
			]);

        DB::table('categorias')->insert([
			'nombre'    => 'budines',
			'imagen'    => 'budines.jpg'
			]);
    
    }
}
