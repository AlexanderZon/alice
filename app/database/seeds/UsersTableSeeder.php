<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		
		User::create( array(
			'role_id' => 1,
			'first_name' => 'Alexis',
			'last_name' => 'Montenegro',
			'username' => 'AlexanderZon',
			'display_name' => 'Alexis Montenegro',
			'email' => 'amontenegro@magicmedia.com.ve',
			'password' => Hash::make('alexis23498535'),
			'status' => 'active'
			));
		
		User::create( array(
			'role_id' => 1,
			'first_name' => 'Antony',
			'last_name' => 'Borges',
			'username' => 'robertdacorte',
			'display_name' => 'Antony Borges',
			'email' => 'aborges@magicmedia.com.ve',
			'password' => Hash::make('robert18554560'),
			'status' => 'active'
			));

	}

}