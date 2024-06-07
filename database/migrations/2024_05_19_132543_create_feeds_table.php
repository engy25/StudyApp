<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeedsTable extends Migration {

	public function up()
	{
		Schema::create('feeds', function(Blueprint $table) {
      $table->id();
			$table->timestamps();
			$table->bigInteger('user_id')->unsigned();
			$table->longText('content')->nullable();
      $table->integer("shares_count")->default(0);
      $table->integer("likes_count")->default(0);
      $table->integer("comments_count")->default(0);
		});
	}

	public function down()
	{
		Schema::drop('feeds');
	}
}
