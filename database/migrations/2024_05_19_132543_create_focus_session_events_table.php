<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFocusSessionEventsTable extends Migration {

	public function up()
	{
		Schema::create('focus_session_events', function(Blueprint $table) {
      $table->id();
			$table->timestamps();
			$table->bigInteger('focus_session_id')->unsigned();
			$table->enum('event_type', array('start', 'pause', 'continue', 'finish', 'multitaskingOn','multitaskingOff'));

			$table->text('details')->nullable();
      $table->timestamp('event_time')->useCurrent();
		});
	}

	public function down()
	{
		Schema::drop('focus_session_events');
	}
}
