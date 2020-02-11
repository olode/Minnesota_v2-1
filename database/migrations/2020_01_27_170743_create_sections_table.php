<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSectionsTable extends Migration {

	public function up()
	{
		Schema::create('sections', function(Blueprint $table) {
			$table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('info');
			$table->integer('stage_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('sections');
	}
}