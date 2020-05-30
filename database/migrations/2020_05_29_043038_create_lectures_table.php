<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLecturesTable extends Migration {

	public function up()
	{
		Schema::create('lectures', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->string('article_arrangement', 20);
			$table->integer('article_arrangement_number');
			$table->date('date');
			$table->string('title', 50);
			$table->text('about');
			$table->integer('class_id')->unsigned()->index();
			$table->integer('full_mark')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('lectures');
	}
}