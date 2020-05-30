<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuizzesTable extends Migration {

	public function up()
	{
		Schema::create('quizzes', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->string('title', 60)->nullable();
			$table->date('date')->nullable();
			$table->integer('full_mark')->unsigned()->nullable();
			$table->integer('class_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('quizzes');
	}
}