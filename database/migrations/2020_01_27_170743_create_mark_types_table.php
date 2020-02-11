<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMarkTypesTable extends Migration {

	public function up()
	{
		Schema::create('mark_types', function(Blueprint $table) {
			$table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->integer('student_mark')->unsigned();
            $table->integer('material_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('mark_types');
	}
}