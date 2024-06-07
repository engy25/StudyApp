<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRemindersTable extends Migration {

	public function up()
	{
		Schema::create('reminders', function(Blueprint $table) {
      $table->id();
			$table->timestamps();
			$table->bigInteger('focus_session_id')->unsigned();
			$table->enum('reminder_type', array('saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'));
		});
	}

	public function down()
	{
		Schema::drop('reminders');
	}
}
