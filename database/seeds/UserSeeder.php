<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
			'name'     => 'Martin',
            'username'     => 'martin',
			'email'    => 'marlopez04@hotmail.com',
			'password' => bcrypt('12345'),
			'type'     => 'admin'
			]);
    }
}
