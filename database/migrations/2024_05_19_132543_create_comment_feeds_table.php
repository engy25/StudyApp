<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentFeedsTable extends Migration {

	public function up()
	{
		Schema::create('comment_feeds', function(Blueprint $table) {
      $table->id();
			$table->timestamps();
      $table->bigInteger('commenteable_id')->unsigned();
      $table->string('commenteable_type');
      $table->bigInteger("parent_comment_id")->unsigned()->nullable();
			$table->bigInteger('user_id')->unsigned();
			$table->text('comment');
		});
	}

	public function down()
	{
		Schema::drop('comment_feeds');
	}
}
