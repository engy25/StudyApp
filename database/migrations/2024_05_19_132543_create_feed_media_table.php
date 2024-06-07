<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeedMediaTable extends Migration {

	public function up()
	{
		Schema::create('feed_media', function(Blueprint $table) {
      $table->id();
			$table->timestamps();
			$table->bigInteger('feed_id')->unsigned();
			$table->string('media');
			$table->enum('type', array('video', 'image','document'));
		});
	}

	public function down()
	{
		Schema::drop('feed_media');
	}
}
