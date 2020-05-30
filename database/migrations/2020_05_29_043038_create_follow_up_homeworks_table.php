<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFollowUpHomeworksTable extends Migration {

	public function up()
	{
		Schema::create('follow_up_homeworks', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->text('homework')->nullable();
			$table->integer('homework_id')->unsigned();
			$table->integer('student_id')->unsigned();
			$table->integer('status')->nullable()->default('0');
			$table->integer('mark')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('follow_up_homeworks');
	}
}