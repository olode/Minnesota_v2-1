<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassesTable extends Migration {

	public function up()
	{
		Schema::create('classes', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->integer('stage_id')->unsigned();
			$table->integer('section_id')->unsigned();
			$table->integer('semester_id')->unsigned();
			$table->integer('material_id')->unsigned();
			$table->integer('teacher_id')->unsigned();
			$table->string('name', 30)->nullable();
			$table->string('class_day', 10)->nullable();
			$table->time('starts_at')->nullable();
			$table->time('ends_at')->nullable();
			$table->integer('max_student')->nullable()->default('10');
			$table->string('lecturing_allowance')->nullable()->default('10');
			$table->text('classroom_url')->nullable();
			$table->integer('required_attendance')->nullable();
			$table->string('class_fee', 10)->nullable();
			$table->date('fee_due_date')->nullable();
			$table->integer('year_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('classes');
	}
}