<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpecializationsTable extends Migration {

	public function up()
	{
		Schema::create('specializations', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->integer('section_id')->unsigned();
			$table->string('name');
			$table->string('info');
			$table->string('max_student_number');
			$table->integer('branch_id')->unsigned()->nullable()->index();
			$table->integer('status')->default('0');
			$table->integer('stage_id')->unsigned()->index();
			$table->string('fees');
			$table->integer('number_of_materials');
			$table->integer('number_of_mandatory_materials');
			$table->integer('number_of_optional_materials');
			$table->integer('number_of_higher_levels');
			$table->integer('number_of_lower_levels');
			$table->integer('total_hours')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('specializations');
	}
}