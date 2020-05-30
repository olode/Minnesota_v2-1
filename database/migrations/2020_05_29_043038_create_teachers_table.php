<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeachersTable extends Migration {

	public function up()
	{
		Schema::create('teachers', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->string('special_teacher_id');
			$table->string('first_name', 200);
			$table->string('second_name', 200);
			$table->string('last_name', 200);
			$table->string('location');
			$table->string('email');
			$table->string('phone_number');
			$table->string('password', 200);
			$table->string('avatar');
			$table->string('qualification', 200);
			$table->string('qualification_image');
			$table->string('passport_number', 200);
			$table->string('passport_image');
			$table->integer('status')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('teachers');
	}
}