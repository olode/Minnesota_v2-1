<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSectionsTable extends Migration {

	public function up()
	{
		Schema::create('sections', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->integer('stage_id')->unsigned();
			$table->string('name');
			$table->string('info');
		});
	}

	public function down()
	{
		Schema::drop('sections');
	}
}