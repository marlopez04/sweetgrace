<?php

use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
			'nombre'     => 'Martin',
			'email'      => 'martin@martin.com',
			'telefono'     => '381-654321',
			'direccion'     => 'rio dl ort 3200'
			]);

        DB::table('clientes')->insert([
			'nombre'     => 'Graciela',
			'email'      => 'Graciela@graciela.com',
			'telefono'     => '381-7654322',
			'direccion'     => 'muy lejos 2100'
			]);

        DB::table('clientes')->insert([
			'nombre'     => 'Laura',
			'email'      => 'laura@laura.com',
			'telefono'     => '381-453621',
			'direccion'     => 'far far a way 1200'
			]);

        DB::table('clientes')->insert([
			'nombre'     => 'Griselda',
			'email'      => 'gry@gry.com',
			'telefono'     => '381-987654',
			'direccion'     => 'allaaaa lejos 1200'
			]);
    }
}
