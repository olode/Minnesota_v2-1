<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('special_user_id');
			$table->string('first_name', 200);
			$table->string('second_name', 200);
			$table->string('last_name', 200);
			$table->string('email');
			$table->string('phone_number', 200);
			$table->string('avatar');
			$table->string('password');
			$table->integer('branch_id')->unsigned();
			$table->integer('status')->default('0');
			$table->integer('role_id')->unsigned()->default('1');
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}