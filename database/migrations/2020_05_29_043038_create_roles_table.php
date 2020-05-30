<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolesTable extends Migration {

	public function up()
	{
		Schema::create('roles', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->string('name', 100)->unique();
		});
	}

	public function down()
	{
		Schema::drop('roles');
	}
}