<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBranchesTable extends Migration {

	public function up()
	{
		Schema::create('branches', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->string('name');
			$table->string('email_of_branch');
			$table->string('phone_number', 200);
			$table->string('location');
			$table->string('country');
			$table->string('manger_full_name', 200);
			$table->string('manger_phone_number');
			$table->string('manger_email');
			$table->integer('status')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('branches');
	}
}