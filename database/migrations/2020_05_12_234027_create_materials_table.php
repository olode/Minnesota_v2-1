<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaterialsTable extends Migration {

	public function up()
	{
		Schema::create('materials', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('code')->nullable();
			$table->string('name');
			$table->string('info');
			$table->string('max_mark');
			$table->integer('max_students_number');
			$table->integer('section_id')->unsigned();
			$table->integer('specialization_id')->unsigned();
			$table->integer('optional')->default('0');
			$table->integer('requirement')->default('0');
			$table->integer('hours')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('materials');
	}
}