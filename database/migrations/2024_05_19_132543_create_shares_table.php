<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSharesTable extends Migration {

	public function up()
	{
		Schema::create('shares', function(Blueprint $table) {
      $table->id();
			$table->timestamps();
			$table->bigInteger('shared_feed_id')->unsigned();
			$table->bigInteger('sharing_user_id')->unsigned();
			$table->text('content')->nullable();
      $table->integer("shares_count")->default(0);
      $table->integer("likes_count")->default(0);
      $table->integer("comments_count")->default(0);
		});
	}

	public function down()
	{
		Schema::drop('shares');
	}
}
