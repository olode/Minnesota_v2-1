<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaterialsTable extends Migration {

	public function up()
	{
		Schema::create('materials', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('special_material_id');
			$table->string('name');
			$table->string('info');
			$table->string('max_mark');
			$table->integer('max_students_number');
			$table->integer('section_id')->unsigned();
			$table->integer('specialization_id')->unsigned();
			$table->integer('optional')->default('0');
			$table->integer('requirement')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('materials');
	}
}