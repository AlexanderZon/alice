<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemoryQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('memory_questions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('evaluation_id');
			$table->string('question');
			$table->string('answer');
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
		Schema::drop('memory_questions');
	}

}
