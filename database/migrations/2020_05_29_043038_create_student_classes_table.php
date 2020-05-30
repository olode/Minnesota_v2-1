<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentClassesTable extends Migration {

	public function up()
	{
		Schema::create('student_classes', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->integer('semester_id')->unsigned()->index();
			$table->integer('student_id')->unsigned();
			$table->integer('class_id')->unsigned()->index();
			$table->integer('year_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('student_classes');
	}
}