<?php

use Illuminate\Database\Seeder;

class SaldoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('saldos')->insert([
			'periodo'       => '201701',
			'importe'     => '10000'
			]);
    }
}
