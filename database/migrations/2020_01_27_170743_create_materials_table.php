<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaterialsTable extends Migration {

	public function up()
	{
		Schema::create('materials', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('info');
			$table->string('maxMark');
			$table->integer('maxStudentNumber');
			$table->integer('specialization_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('materials');
	}
}