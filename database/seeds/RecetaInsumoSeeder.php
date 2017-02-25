<?php

use Illuminate\Database\Seeder;

class RecetaInsumoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //receta 1
        DB::table('recetainsumos')->insert([
			'nombre'     => 'tartera baja',
			'cantidad'     => '1',
			'insumo_id'     => '1',
			'receta_id'     => '1',
			'precio'     => '3',
            'unidad'     => '1',
            'costo_u' => '2.5'
			]);

        DB::table('recetainsumos')->insert([
			'nombre'     => 'moño',
			'cantidad'     => '1',
			'insumo_id'     => '2',
			'receta_id'     => '1',
			'precio'     => '0.5',
            'unidad'     => '1',
            'costo_u' => '0.5'
			]);

        DB::table('recetainsumos')->insert([
			'nombre'     => 'bolsa camiseta',
			'cantidad'     => '1',
			'insumo_id'     => '3',
			'receta_id'     => '1',
			'precio'     => '0.5',
            'unidad'     => '1',
            'costo_u' => '0.5'
			]);

        //receta 2
        DB::table('recetainsumos')->insert([
			'nombre'     => 'tartera baja',
			'cantidad'     => '1',
			'insumo_id'     => '1',
			'receta_id'     => '2',
			'precio'     => '3',
            'unidad'     => '1',
            'costo_u' => '2.5'
			]);

        DB::table('recetainsumos')->insert([
			'nombre'     => 'moño',
			'cantidad'     => '1',
			'insumo_id'     => '2',
			'receta_id'     => '2',
			'precio'     => '0.5',
            'unidad'     => '1',
            'costo_u' => '0.5'
			]);

        DB::table('recetainsumos')->insert([
			'nombre'     => 'bolsa camiseta',
			'cantidad'     => '1',
			'insumo_id'     => '3',
			'receta_id'     => '2',
			'precio'     => '0.5',
            'unidad'     => '1',
            'costo_u' => '0.5'
			]);

        //receta 3
        DB::table('recetainsumos')->insert([
			'nombre'     => 'tartera baja',
			'cantidad'     => '1',
			'insumo_id'     => '1',
			'receta_id'     => '3',
			'precio'     => '3',
            'unidad'     => '1',
            'costo_u' => '2.5'
			]);

        DB::table('recetainsumos')->insert([
			'nombre'     => 'moño',
			'cantidad'     => '1',
			'insumo_id'     => '2',
			'receta_id'     => '3',
			'precio'     => '0.5',
            'unidad'     => '1',
            'costo_u' => '0.5'
			]);

        DB::table('recetainsumos')->insert([
			'nombre'     => 'bolsa camiseta',
			'cantidad'     => '1',
			'insumo_id'     => '3',
			'receta_id'     => '3',
			'precio'     => '0.5',
            'unidad'     => '1',
            'costo_u' => '0.5'
			]);

        //receta 4
        DB::table('recetainsumos')->insert([
			'nombre'     => 'tartera baja',
			'cantidad'     => '1',
			'insumo_id'     => '1',
			'receta_id'     => '4',
			'precio'     => '3',
            'unidad'     => '1',
            'costo_u' => '2.5'
			]);

        DB::table('recetainsumos')->insert([
			'nombre'     => 'moño',
			'cantidad'     => '1',
			'insumo_id'     => '2',
			'receta_id'     => '4',
			'precio'     => '0.5',
            'unidad'     => '1',
            'costo_u' => '0.5'
			]);

        DB::table('recetainsumos')->insert([
			'nombre'     => 'bolsa camiseta',
			'cantidad'     => '1',
			'insumo_id'     => '3',
			'receta_id'     => '4',
			'precio'     => '0.5',
            'unidad'     => '1',
            'costo_u' => '0.5'
			]);

        //receta 5
        DB::table('recetainsumos')->insert([
			'nombre'     => 'tartera baja',
			'cantidad'     => '1',
			'insumo_id'     => '1',
			'receta_id'     => '5',
			'precio'     => '3',
            'unidad'     => '1',
            'costo_u' => '2.5'
			]);

        DB::table('recetainsumos')->insert([
			'nombre'     => 'moño',
			'cantidad'     => '1',
			'insumo_id'     => '2',
			'receta_id'     => '5',
			'precio'     => '0.5',
            'unidad'     => '1',
            'costo_u' => '0.5'
			]);

        DB::table('recetainsumos')->insert([
			'nombre'     => 'bolsa camiseta',
			'cantidad'     => '1',
			'insumo_id'     => '3',
			'receta_id'     => '5',
			'precio'     => '0.5',
            'unidad'     => '1',
            'costo_u' => '0.5'
			]);

        //receta 6
        DB::table('recetainsumos')->insert([
			'nombre'     => 'tartera baja',
			'cantidad'     => '1',
			'insumo_id'     => '1',
			'receta_id'     => '6',
			'precio'     => '3',
            'unidad'     => '1',
            'costo_u' => '2.5'
			]);

        DB::table('recetainsumos')->insert([
			'nombre'     => 'moño',
			'cantidad'     => '1',
			'insumo_id'     => '2',
			'receta_id'     => '6',
			'precio'     => '0.5',
            'unidad'     => '1',
            'costo_u' => '0.5'
			]);

        DB::table('recetainsumos')->insert([
			'nombre'     => 'bolsa camiseta',
			'cantidad'     => '1',
			'insumo_id'     => '3',
			'receta_id'     => '6',
			'precio'     => '0.5',
            'unidad'     => '1',
            'costo_u' => '0.5'
			]);

        //receta 7
        DB::table('recetainsumos')->insert([
			'nombre'     => 'tartera baja',
			'cantidad'     => '1',
			'insumo_id'     => '1',
			'receta_id'     => '7',
			'precio'     => '3',
            'unidad'     => '1',
            'costo_u' => '2.5'
			]);

        DB::table('recetainsumos')->insert([
			'nombre'     => 'moño',
			'cantidad'     => '1',
			'insumo_id'     => '2',
			'receta_id'     => '7',
			'precio'     => '0.5',
            'unidad'     => '1',
            'costo_u' => '0.5'
			]);

        DB::table('recetainsumos')->insert([
			'nombre'     => 'bolsa camiseta',
			'cantidad'     => '1',
			'insumo_id'     => '3',
			'receta_id'     => '7',
			'precio'     => '0.5',
            'unidad'     => '1',
            'costo_u' => '0.5'
			]);
    }
}
