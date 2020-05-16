<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewsAnnouncementsTable extends Migration {

	public function up()
	{
		Schema::create('news_announcements', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('class_id')->unsigned()->nullable();
			$table->string('title');
			$table->text('text');
			$table->bigInteger('owner_id');
			$table->bigInteger('owner_type');
		});
	}

	public function down()
	{
		Schema::drop('news_announcements');
	}
}