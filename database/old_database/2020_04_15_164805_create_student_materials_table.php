<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentMaterialsTable extends Migration {

	public function up()
	{
		Schema::create('student_materials', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('year_of_add');
			$table->integer('teacher_material_id')->unsigned();
			$table->integer('student_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('student_materials');
	}
}