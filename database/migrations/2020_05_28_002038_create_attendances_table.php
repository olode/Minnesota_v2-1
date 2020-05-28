<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttendancesTable extends Migration {

	public function up()
	{
		Schema::create('attendances', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('lecture_id')->unsigned();
			$table->string('attendance')->default('0');
			$table->integer('student_id')->unsigned()->nullable()->index();
		});
	}

	public function down()
	{
		Schema::drop('attendances');
	}
}