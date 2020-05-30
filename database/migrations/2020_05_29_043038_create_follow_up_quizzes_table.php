<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFollowUpQuizzesTable extends Migration {

	public function up()
	{
		Schema::create('follow_up_quizzes', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->integer('student_id')->unsigned()->index();
			$table->integer('mark')->nullable();
			$table->boolean('status')->nullable()->default(0);
			$table->integer('quizze_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('follow_up_quizzes');
	}
}