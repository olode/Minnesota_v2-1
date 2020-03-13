<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpecializationsTable extends Migration {

	public function up()
	{
		Schema::create('specializations', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('section_id')->unsigned();
			$table->string('name');
			$table->string('info');
			$table->string('maxStudentNumber');
			$table->string('rememberToken')->default('0');
			$table->integer('status')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('specializations');
	}
}