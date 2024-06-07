<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeedLikesTable extends Migration {

	public function up()
	{
		Schema::create('feed_likes', function(Blueprint $table) {
      $table->id();
			$table->timestamps();
      $table->bigInteger('likeable_id')->unsigned();
        $table->string('likeable_type');
			$table->bigInteger('user_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('feed_likes');
	}
}
