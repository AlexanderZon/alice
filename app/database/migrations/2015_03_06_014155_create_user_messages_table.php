<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_messages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_message')->unsigned()->index();
			$table->foreign('id_message')->references('id')->on('messages')->onDelete('cascade');
			$table->integer('id_user')->unsigned()->index();
			$table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
		Schema::drop('user_messages');
	}

}
