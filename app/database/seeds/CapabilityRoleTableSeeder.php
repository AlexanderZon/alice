<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CapabilityRoleTableSeeder extends Seeder {

	public function run()
	{
		RoleCapability::create( array(
			'id' => 1,
			'capability_id' => '1',
			'role_id' => '1',
			));
				
		RoleCapability::create( array(
			'id' => 2,
			'capability_id' => '2',
			'role_id' => '1',
			));
				
		RoleCapability::create( array(
			'id' => 6,
			'capability_id' => '6',
			'role_id' => '1',
			));
				
		RoleCapability::create( array(
			'id' => 7,
			'capability_id' => '7',
			'role_id' => '1',
			));
				
		RoleCapability::create( array(
			'id' => 8,
			'capability_id' => '8',
			'role_id' => '1',
			));
				
		RoleCapability::create( array(
			'id' => 9,
			'capability_id' => '9',
			'role_id' => '1',
			));
				
		RoleCapability::create( array(
			'id' => 10,
			'capability_id' => '10',
			'role_id' => '1',
			));
				
		RoleCapability::create( array(
			'id' => 11,
			'capability_id' => '11',
			'role_id' => '1',
			));
				
		RoleCapability::create( array(
			'id' => 12,
			'capability_id' => '12',
			'role_id' => '1',
			));
				
		RoleCapability::create( array(
			'id' => 13,
			'capability_id' => '13',
			'role_id' => '1',
			));
				
		RoleCapability::create( array(
			'id' => 14,
			'capability_id' => '14',
			'role_id' => '1',
			));
				
		RoleCapability::create( array(
			'id' => 16,
			'capability_id' => '4',
			'role_id' => '1',
			));
				
		RoleCapability::create( array(
			'id' => 17,
			'capability_id' => '5',
			'role_id' => '1',
			));
				
		RoleCapability::create( array(
			'id' => 18,
			'capability_id' => '3',
			'role_id' => '1',
			));
	}

}