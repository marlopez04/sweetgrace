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
			'importe'     => '0'
			]);
/*
        DB::table('saldos')->insert([
            'periodo'       => '201702',
            'importe'     => '24500'
            ]);
        DB::table('saldos')->insert([
            'periodo'       => '201703',
            'importe'     => '34000'
            ]);
        DB::table('saldos')->insert([
            'periodo'       => '201704',
            'importe'     => '39300'
            ]);
*/
    }
}
