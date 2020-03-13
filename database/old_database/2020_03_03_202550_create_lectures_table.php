<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLecturesTable extends Migration {

	public function up()
	{
		Schema::create('lectures', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('material_id')->unsigned();
			$table->string('articleArrangement', 200);
			$table->integer('articleArrangementNumber');
			$table->string('date', 200);
			$table->string('tittle', 200);
			$table->text('about');
		});
	}

	public function down()
	{
		Schema::drop('lectures');
	}
}