<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScheduleTable extends Migration {

	public function up()
	{
		Schema::create('schedule', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('day');
			$table->integer('teacher_materials_id')->unsigned();
			$table->datetime('time');
			$table->string('room_number');
		});
	}

	public function down()
	{
		Schema::drop('schedule');
	}
}