<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFinalExamsTable extends Migration {

	public function up()
	{
		Schema::create('final_exams', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->string('title', 60)->nullable();
			$table->date('date')->nullable();
			$table->integer('full_mark')->unsigned()->nullable();
			$table->integer('class_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('final_exams');
	}
}