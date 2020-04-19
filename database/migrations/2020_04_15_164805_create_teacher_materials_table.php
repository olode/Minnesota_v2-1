<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeacherMaterialsTable extends Migration {

	public function up()
	{
		Schema::create('teacher_materials', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('year_of_add');
			$table->integer('teacher_id')->unsigned();
			$table->integer('material_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('teacher_materials');
	}
}