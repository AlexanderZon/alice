<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notifications', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('notificationable_id');
			$table->string('notificationable_type');
			$table->string('icon', 64);
			$table->string('picture');
			$table->string('route', 1024);
			$table->string('title');
			$table->string('description', 1024);
			$table->enum('status', array('fired', 'catched', 'viewed', 'deleted'))->default('fired');
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
		Schema::drop('notifications');
	}

}
