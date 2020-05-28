<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHomeworksTable extends Migration {

	public function up()
	{
		Schema::create('homeworks', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title', 20)->nullable();
			$table->text('info')->nullable();
			$table->date('due_date')->nullable();
			$table->integer('lecture_id')->unsigned();
			$table->integer('class_id')->unsigned();
			$table->integer('stage_id')->unsigned();
			$table->integer('section_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('homeworks');
	}
}