<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFocusSessionsTable extends Migration {

	public function up()
	{
		Schema::create('focus_sessions', function(Blueprint $table) {
      $table->id();
			$table->timestamps();
			$table->bigInteger('feature_id')->unsigned();
      $table->bigInteger("goal_id")->unsigned();
			$table->bigInteger('user_id')->unsigned();
			$table->integer('duration')->nullable();
			$table->datetime('start_time');
			$table->datetime('end_time')->nullable();
			$table->boolean('completed')->default(0);
			$table->text('notes')->nullable();
			$table->boolean('pomodoro_mode')->default(0);
			$table->boolean('multitasking_events_mode')->default(0);
			$table->boolean('is_reminder')->default(0);
		});
	}

	public function down()
	{
		Schema::drop('focus_sessions');
	}
}
