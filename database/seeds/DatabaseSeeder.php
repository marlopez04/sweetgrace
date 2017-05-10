<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(ListaSeeder::class);
        $this->call(RecetaSeeder::class);
        $this->call(ArticuloSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(IngredienteSeeder::class);
        $this->call(InsumoSeeder::class);
        $this->call(RecetaIngredienteSeeder::class);
        $this->call(RecetaInsumoSeeder::class);
        $this->call(SaldoSeeder::class);

        Model::reguard();
    }
}
