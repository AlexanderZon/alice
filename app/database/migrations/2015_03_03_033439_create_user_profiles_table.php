<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_profiles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->longText('about_me');
			$table->longText('activities');
			$table->longText('interests');
			$table->date('born_date');
			$table->string('born_place');
			$table->enum('sex', array('male', 'female'))->default('male');
			$table->string('picture');
			$table->string('cover');
			$table->string('website');
			$table->text('address');
			$table->longText('phones');
			$table->string('timezone');
			$table->string('locale');
			$table->longText('customs');
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
		Schema::drop('user_profiles');
	}

}
