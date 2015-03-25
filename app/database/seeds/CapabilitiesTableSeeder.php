<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CapabilitiesTableSeeder extends Seeder {

	public function run()
	{
		Capability::create( array(
			'id' => 1,
			'name' => 'administrators_dashboard_get_index',
			'title' => 'Visualizar Escritorio',
			'description' => '',
			'controller' => '\Administrators\DashboardController@getIndex',
			'crud' => 'READ',
			));
				
		Capability::create( array(
			'id' => 2,
			'name' => 'security_user_get_index',
			'title' => 'Visualizar Usuarios',
			'description' => '',
			'controller' => '\Security\UserController@getIndex',
			'crud' => 'READ',
			));
				
		Capability::create( array(
			'id' => 3,
			'name' => 'security_user_get_create',
			'title' => 'Crear Usuarios',
			'description' => '',
			'controller' => '\Security\UserController@getCreate',
			'crud' => 'CREATE',
			));
				
		Capability::create( array(
			'id' => 4,
			'name' => 'security_user_get_update',
			'title' => 'Editar Usuarios',
			'description' => '',
			'controller' => '\Security\UserController@getUpdate',
			'crud' => 'UPDATE',
			));
				
		Capability::create( array(
			'id' => 5,
			'name' => 'security_user_get_delete',
			'title' => 'Eliminar Usuarios',
			'description' => '',
			'controller' => '\Security\UserController@getDelete',
			'crud' => 'DELETE',
			));
				
		Capability::create( array(
			'id' => 6,
			'name' => 'security_capability_get_index',
			'title' => 'Visualizar Capacidades',
			'description' => '',
			'controller' => '\Security\CapabilityController@getIndex',
			'crud' => 'READ',
			));
				
		Capability::create( array(
			'id' => 7,
			'name' => 'security_capability_get_create',
			'title' => 'Crear Capacidades',
			'description' => '',
			'controller' => '\Security\CapabilityController@getCreate',
			'crud' => 'CREATE',
			));
				
		Capability::create( array(
			'id' => 8,
			'name' => 'security_capability_get_update',
			'title' => 'Editar Capacidades',
			'description' => '',
			'controller' => '\Security\CapabilityController@getUpdate',
			'crud' => 'UPDATE',
			));
				
		Capability::create( array(
			'id' => 9,
			'name' => 'security_capability_get_delete',
			'title' => 'Eliminar Capacidades',
			'description' => '',
			'controller' => '\Security\CapabilityController@getDelete',
			'crud' => 'DELETE',
			));
				
		Capability::create( array(
			'id' => 10,
			'name' => 'security_role_get_index',
			'title' => 'Visualizar Roles',
			'description' => '',
			'controller' => '\Security\RoleController@getIndex',
			'crud' => 'READ',
			));
				
		Capability::create( array(
			'id' => 11,
			'name' => 'security_role_get_create',
			'title' => 'Crear Roles',
			'description' => '',
			'controller' => '\Security\RoleController@getCreate',
			'crud' => 'CREATE',
			));
				
		Capability::create( array(
			'id' => 12,
			'name' => 'security_role_get_update',
			'title' => 'Editar Roles',
			'description' => '',
			'controller' => '\Security\RoleController@getUpdate',
			'crud' => 'UPDATE',
			));
				
		Capability::create( array(
			'id' => 13,
			'name' => 'security_role_get_delete',
			'title' => 'Eliminar Roles',
			'description' => '',
			'controller' => '\Security\RoleController@getDelete',
			'crud' => 'DELETE',
			));
				
		Capability::create( array(
			'id' => 14,
			'name' => 'security_role_get_assign',
			'title' => 'Asignar Capacidades ',
			'description' => '',
			'controller' => '\Security\RoleController@getAssign',
			'crud' => 'UPDATE',
			));
	}

}