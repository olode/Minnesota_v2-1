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
			$table->integer('mark_types_id')->unsigned();
			$table->integer('student_mark');
			$table->integer('student_material_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('student_marks');
	}
}