<?php

use Illuminate\Database\Seeder;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articulos')->insert([
			'nombre'     => 'bombones1',
			'descripcion'     => 'bombones rellenos',
			'imagen'    => 'bombones1.jpg',
			'precio'     => '60',
			'lista_precio_id'     => '1',
			'receta_id'     => '1',
			'user_id'     => '1',
			'categoria_id'     => '1'
			]);

        DB::table('articulos')->insert([
			'nombre'     => 'bombones2',
			'descripcion'     => 'bombones rellenos',
			'imagen'    => 'bombones2.jpg',
			'precio'     => '60',
			'lista_precio_id'     => '1',
			'receta_id'     => '2',
			'user_id'     => '1',
			'categoria_id'     => '1'
			]);

        DB::table('articulos')->insert([
			'nombre'     => 'pandulce',
			'descripcion'     => 'pandulce',
			'imagen'    => 'pandulce.jpg',
			'precio'     => '100',
			'lista_precio_id'     => '1',
			'receta_id'     => '3',
			'user_id'     => '1',
			'categoria_id'     => '3'
			]);

        DB::table('articulos')->insert([
			'nombre'     => 'pandulce2',
			'descripcion'     => 'pandulce',
			'imagen'    => 'pandulce2.jpg',
			'precio'     => '120',
			'lista_precio_id'     => '1',
			'receta_id'     => '4',
			'user_id'     => '1',
			'categoria_id'     => '3'
			]);

        DB::table('articulos')->insert([
			'nombre'     => 'tarta',
			'descripcion'     => 'tarta',
			'imagen'    => 'tarta.jpg',
			'precio'     => '90',
			'lista_precio_id'     => '1',
			'receta_id'     => '5',
			'user_id'     => '1',
			'categoria_id'     => '2'
			]);

        DB::table('articulos')->insert([
			'nombre'     => 'galletas',
			'descripcion'     => 'galletas',
			'imagen'    => 'galletas.jpg',
			'precio'     => '60',
			'lista_precio_id'     => '1',
			'receta_id'     => '6',
			'user_id'     => '1',
			'categoria_id'     => '4'
			]);

        DB::table('articulos')->insert([
			'nombre'     => 'budin',
			'descripcion'     => 'budin',
			'imagen'    => 'budin.jpg',
			'precio'     => '60',
			'lista_precio_id'     => '1',
			'receta_id'     => '7',
			'user_id'     => '1',
			'categoria_id'     => '5'
			]);
    }
}
