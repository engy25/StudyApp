<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoalsTable extends Migration {

	public function up()
	{
		Schema::create('goals', function(Blueprint $table) {
      $table->id();
			$table->timestamps();
			$table->string('name')->nullable();
			$table->bigInteger('user_id')->unsigned();
			$table->integer('duration')->nullable();
			$table->enum('type', array('daily', 'general'));
		});
	}

	public function down()
	{
		Schema::drop('goals');
	}
}
