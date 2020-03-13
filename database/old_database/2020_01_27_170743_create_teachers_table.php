<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeachersTable extends Migration {

	public function up()
	{
		Schema::create('teachers', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('firstName', 200);
			$table->string('secondName', 200);
			$table->string('lastName', 200);
			$table->string('location');
			$table->string('email');
			$table->string('phoneNumber');
			$table->string('password', 200);
			$table->string('avatar');
			$table->string('qualification', 200);
			$table->string('imageOfQualification');
			$table->string('passportNumber', 200);
			$table->string('imageOfPassport');
			$table->integer('status')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('teachers');
	}
}