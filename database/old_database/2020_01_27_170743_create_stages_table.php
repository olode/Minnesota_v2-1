<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStagesTable extends Migration {

	public function up()
	{
		Schema::create('stages', function(Blueprint $table) {
			$table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('info');
			$table->integer('branch_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('stages');
	}
}