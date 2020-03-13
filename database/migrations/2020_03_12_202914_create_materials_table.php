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
			$table->integer('specialization_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('materials');
	}
}