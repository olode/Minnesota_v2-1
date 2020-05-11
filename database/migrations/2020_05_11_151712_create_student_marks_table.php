<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentMarksTable extends Migration {

	public function up()
	{
		Schema::create('student_marks', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('student_id')->unsigned();
			$table->integer('mark_type_id')->unsigned();
			$table->integer('student_mark')->nullable();
			$table->integer('class_id')->unsigned()->nullable()->index();
			$table->integer('year_id')->unsigned()->nullable()->index();
		});
	}

	public function down()
	{
		Schema::drop('student_marks');
	}
}