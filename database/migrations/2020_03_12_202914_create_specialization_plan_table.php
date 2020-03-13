<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpecializationPlanTable extends Migration {

	public function up()
	{
		Schema::create('specialization_plan', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('specialization_id')->unsigned();
			$table->string('material_code');
			$table->integer('hours');
			$table->string('past_requirement');
			$table->string('level');
		});
	}

	public function down()
	{
		Schema::drop('specialization_plan');
	}
}