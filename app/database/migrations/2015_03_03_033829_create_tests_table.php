<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tests', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('evaluation_id');
			$table->double('percentage', 4, 2);
			$table->integer('hits');
			$table->integer('mistakes');
			$table->integer('duration');
			$table->integer('attempts');
			$table->integer('points');
			$table->string('status');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tests');
	}

}
