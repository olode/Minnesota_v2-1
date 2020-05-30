<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSemestersTable extends Migration {

	public function up()
	{
		Schema::create('semesters', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->string('title', 20)->nullable();
			$table->string('semester_code', 10)->nullable();
			$table->date('starts_at')->nullable();
			$table->date('end_at')->nullable();
			$table->integer('max_courses')->nullable();
			$table->integer('min_courses')->nullable();
			$table->integer('semester_fee')->nullable();
			$table->integer('min_paid')->nullable();
			$table->date('due_date')->nullable();
			$table->integer('year_id')->unsigned()->index();
			$table->integer('specialization_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('semesters');
	}
}