<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBranchesTable extends Migration {

	public function up()
	{
		Schema::create('branches', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('emailOfBranch');
			$table->string('phoneNumber', 200);
			$table->string('location');
			$table->string('country');
			$table->string('mangerFullName', 200);
			$table->string('mangerPhoneNumber');
			$table->string('mangerEmail');
			$table->integer('status')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('branches');
	}
}