<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStagesTable extends Migration {

	public function up()
	{
		Schema::create('stages', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->integer('branch_id')->unsigned();
			$table->string('name');
			$table->string('info');
		});
	}

	public function down()
	{
		Schema::drop('stages');
	}
}