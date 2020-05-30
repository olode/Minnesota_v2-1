<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsTable extends Migration {

	public function up()
	{
		Schema::create('students', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->string('special_student_id');
			$table->string('first_name', 200);
			$table->string('second_name', 200);
			$table->string('last_name', 200);
			$table->string('location', 200);
			$table->string('email');
			$table->string('phone_number', 200);
			$table->string('password', 200);
			$table->string('avatar');
			$table->string('qualification', 200);
			$table->string('qualification_image');
			$table->string('passport_number', 200);
			$table->string('passport_image');
			$table->integer('status')->default('0');
			$table->integer('branch_id')->unsigned();
			$table->integer('section_id')->unsigned();
			$table->integer('specialization_id')->unsigned();
			$table->string('birthday');
			$table->string('nationality');
			$table->string('gender');
			$table->string('graduation_rate');
		});
	}

	public function down()
	{
		Schema::drop('students');
	}
}