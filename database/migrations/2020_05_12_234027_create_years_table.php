<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYearsTable extends Migration {

	public function up()
	{
		Schema::create('years', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('year_h')->nullable();
			$table->integer('year_m')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('years');
	}
}