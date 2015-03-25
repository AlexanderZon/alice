<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RolesTableSeeder extends Seeder {

	public function run()
	{
		Role::create( array(
			'name' => 'superadmin',
			'title' => 'Super Administrador',
			'description' => '',
			'status' => 'active',
			'dashboard_id' => 1,
			));
		
		Role::create( array(
			'name' => 'coordinator',
			'title' => 'Coordinador',
			'description' => '',
			'status' => 'active',
			'dashboard_id' => 0,
			));
		
		Role::create( array(
			'name' => 'teacher',
			'title' => 'Profesor',
			'description' => '',
			'status' => 'active',
			'dashboard_id' => 0,
			));
		
		Role::create( array(
			'name' => 'student',
			'title' => 'Estudiante',
			'description' => '',
			'status' => 'active',
			'dashboard_id' => 0,
			));
	}

}