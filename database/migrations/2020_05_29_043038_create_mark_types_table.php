<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMarkTypesTable extends Migration {

	public function up()
	{
		Schema::create('mark_types', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->string('name');
			$table->string('title', 30)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('mark_types');
	}
}