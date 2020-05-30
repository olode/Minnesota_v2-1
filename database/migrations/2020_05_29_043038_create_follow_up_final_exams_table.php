<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFollowUpFinalExamsTable extends Migration {

	public function up()
	{
		Schema::create('follow_up_final_exams', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->integer('student_id')->unsigned()->index();
			$table->integer('mark')->unsigned()->nullable();
			$table->boolean('status')->nullable();
			$table->integer('final_exam_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('follow_up_final_exams');
	}
}