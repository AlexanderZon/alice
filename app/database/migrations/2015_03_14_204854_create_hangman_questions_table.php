<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHangmanQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hangman_questions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('evaluation_id');
			$table->text('question');
			$table->string('word');
			$table->integer('seconds');
			$table->string('reference');
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
		Schema::drop('hangman_questions');
	}

}
