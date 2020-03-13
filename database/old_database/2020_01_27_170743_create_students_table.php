<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsTable extends Migration {

	public function up()
	{
		Schema::create('students', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('firstName', 200);
			$table->string('secondName', 200);
			$table->string('lastName', 200);
			$table->string('location', 200);
			$table->string('email');
			$table->string('phoneNumber', 200);
			$table->string('password', 200);
			$table->string('avatar');
			$table->string('qualification', 200);
			$table->string('imageOfQualification');
			$table->string('passportNumber', 200);
            $table->string('imageOfPassport');
			$table->integer('specialization_id')->unsigned();
			$table->integer('status')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('students');
	}
}