<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMarkTypesTable extends Migration {

	public function up()
	{
		Schema::create('mark_types', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('student_mark')->unsigned();
			$table->string('name');
		});
	}

	public function down()
	{
		Schema::drop('mark_types');
	}
}