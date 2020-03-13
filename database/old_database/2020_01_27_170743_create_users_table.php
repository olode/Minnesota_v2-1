<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('firstName', 200);
			$table->string('secondName', 200);
			$table->string('lastName', 200);
			$table->string('email');
			$table->string('phoneNumber', 200);
			$table->string('avatar');
			$table->string('password');
			$table->integer('branche_id')->unsigned();
			$table->integer('status')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}