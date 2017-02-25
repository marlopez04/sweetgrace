<?php

use Illuminate\Database\Seeder;

class RecetaIngredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //receta 1
        DB::table('recetaingredientes')->insert([
			'nombre'     => 'harina',
			'cantidad'     => '400',
			'ingrediente_id'     => '1',
			'receta_id'     => '1',
			'precio'     => '4',
            'unidad'     => '100',
            'costo_u' => '1'
			]);

        DB::table('recetaingredientes')->insert([
            'nombre'     => 'huevos',
            'cantidad'     => '3',
            'ingrediente_id'     => '2',
            'receta_id'     => '1',
            'precio'     => '9',
            'unidad'     => '1',
            'costo_u' => '3'
            ]);

        DB::table('recetaingredientes')->insert([
            'nombre'     => 'azucar',
            'cantidad'     => '300',
            'ingrediente_id'     => '3',
            'receta_id'     => '1',
            'precio'     => '6',
            'unidad'     => '1',
            'costo_u' => '2'
            ]);

        //receta 2
        DB::table('recetaingredientes')->insert([
            'nombre'     => 'harina',
            'cantidad'     => '400',
            'ingrediente_id'     => '1',
            'receta_id'     => '2',
            'precio'     => '4',
            'unidad'     => '100',
            'costo_u' => '1'
            ]);

        DB::table('recetaingredientes')->insert([
            'nombre'     => 'huevos',
            'cantidad'     => '3',
            'ingrediente_id'     => '2',
            'receta_id'     => '2',
            'precio'     => '9',
            'unidad'     => '1',
            'costo_u' => '3'
            ]);

        DB::table('recetaingredientes')->insert([
            'nombre'     => 'azucar',
            'cantidad'     => '300',
            'ingrediente_id'     => '3',
            'receta_id'     => '2',
            'precio'     => '6',
            'unidad'     => '1',
            'costo_u' => '2'
            ]);

        //receta 3
        DB::table('recetaingredientes')->insert([
            'nombre'     => 'harina',
            'cantidad'     => '400',
            'ingrediente_id'     => '1',
            'receta_id'     => '3',
            'precio'     => '4',
            'unidad'     => '100',
            'costo_u' => '1'
            ]);

        DB::table('recetaingredientes')->insert([
            'nombre'     => 'huevos',
            'cantidad'     => '3',
            'ingrediente_id'     => '2',
            'receta_id'     => '3',
            'precio'     => '9',
            'unidad'     => '1',
            'costo_u' => '3'
            ]);

        DB::table('recetaingredientes')->insert([
            'nombre'     => 'azucar',
            'cantidad'     => '300',
            'ingrediente_id'     => '3',
            'receta_id'     => '3',
            'precio'     => '6',
            'unidad'     => '1',
            'costo_u' => '2'
            ]);

        //receta 4
        DB::table('recetaingredientes')->insert([
            'nombre'     => 'harina',
            'cantidad'     => '400',
            'ingrediente_id'     => '1',
            'receta_id'     => '4',
            'precio'     => '4',
            'unidad'     => '100',
            'costo_u' => '1'
            ]);

        DB::table('recetaingredientes')->insert([
            'nombre'     => 'huevos',
            'cantidad'     => '3',
            'ingrediente_id'     => '2',
            'receta_id'     => '4',
            'precio'     => '9',
            'unidad'     => '1',
            'costo_u' => '3'
            ]);

        DB::table('recetaingredientes')->insert([
            'nombre'     => 'azucar',
            'cantidad'     => '300',
            'ingrediente_id'     => '3',
            'receta_id'     => '4',
            'precio'     => '6',
            'unidad'     => '1',
            'costo_u' => '2'
            ]);

        //receta 4
        DB::table('recetaingredientes')->insert([
            'nombre'     => 'harina',
            'cantidad'     => '400',
            'ingrediente_id'     => '1',
            'receta_id'     => '4',
            'precio'     => '4',
            'unidad'     => '100',
            'costo_u' => '1'
            ]);

        DB::table('recetaingredientes')->insert([
            'nombre'     => 'huevos',
            'cantidad'     => '3',
            'ingrediente_id'     => '2',
            'receta_id'     => '4',
            'precio'     => '9',
            'unidad'     => '1',
            'costo_u' => '3'
            ]);

        DB::table('recetaingredientes')->insert([
            'nombre'     => 'azucar',
            'cantidad'     => '300',
            'ingrediente_id'     => '3',
            'receta_id'     => '4',
            'precio'     => '6',
            'unidad'     => '1',
            'costo_u' => '2'
            ]);

        //receta 5
        DB::table('recetaingredientes')->insert([
            'nombre'     => 'harina',
            'cantidad'     => '400',
            'ingrediente_id'     => '1',
            'receta_id'     => '5',
            'precio'     => '4',
            'unidad'     => '100',
            'costo_u' => '1'
            ]);

        DB::table('recetaingredientes')->insert([
            'nombre'     => 'huevos',
            'cantidad'     => '3',
            'ingrediente_id'     => '2',
            'receta_id'     => '5',
            'precio'     => '9',
            'unidad'     => '1',
            'costo_u' => '3'
            ]);

        DB::table('recetaingredientes')->insert([
            'nombre'     => 'azucar',
            'cantidad'     => '300',
            'ingrediente_id'     => '3',
            'receta_id'     => '5',
            'precio'     => '6',
            'unidad'     => '1',
            'costo_u' => '2'
            ]);

        //receta 6
        DB::table('recetaingredientes')->insert([
            'nombre'     => 'harina',
            'cantidad'     => '400',
            'ingrediente_id'     => '1',
            'receta_id'     => '6',
            'precio'     => '4',
            'unidad'     => '100',
            'costo_u' => '1'
            ]);

        DB::table('recetaingredientes')->insert([
            'nombre'     => 'huevos',
            'cantidad'     => '3',
            'ingrediente_id'     => '2',
            'receta_id'     => '6',
            'precio'     => '9',
            'unidad'     => '1',
            'costo_u' => '3'
            ]);

        DB::table('recetaingredientes')->insert([
            'nombre'     => 'azucar',
            'cantidad'     => '300',
            'ingrediente_id'     => '3',
            'receta_id'     => '6',
            'precio'     => '6',
            'unidad'     => '1',
            'costo_u' => '2'
            ]);

        //receta 7
        DB::table('recetaingredientes')->insert([
            'nombre'     => 'harina',
            'cantidad'     => '400',
            'ingrediente_id'     => '1',
            'receta_id'     => '7',
            'precio'     => '4',
            'unidad'     => '100',
            'costo_u' => '1'
            ]);

        DB::table('recetaingredientes')->insert([
            'nombre'     => 'huevos',
            'cantidad'     => '3',
            'ingrediente_id'     => '2',
            'receta_id'     => '7',
            'precio'     => '9',
            'unidad'     => '1',
            'costo_u' => '3'
            ]);

        DB::table('recetaingredientes')->insert([
            'nombre'     => 'azucar',
            'cantidad'     => '300',
            'ingrediente_id'     => '3',
            'receta_id'     => '7',
            'precio'     => '6',
            'unidad'     => '1',
            'costo_u' => '2'
            ]);
    }
}
