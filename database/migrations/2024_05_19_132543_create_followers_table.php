<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFollowersTable extends Migration {

	public function up()
	{
		Schema::create('followers', function(Blueprint $table) {
      $table->id();
			$table->timestamps();
			$table->bigInteger('follower_id')->unsigned();
			$table->bigInteger('following_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('followers');
	}
}
