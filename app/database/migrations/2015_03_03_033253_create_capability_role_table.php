<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCapabilityRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('capability_role', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_capability')->unsigned()->index();
			$table->foreign('id_capability')->references('id')->on('capabilities')->onDelete('cascade');
			$table->integer('id_role')->unsigned()->index();
			$table->foreign('id_role')->references('id')->on('roles')->onDelete('cascade');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('capability_role');
	}

}
