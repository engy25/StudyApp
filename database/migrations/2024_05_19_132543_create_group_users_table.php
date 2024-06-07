<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupUsersTable extends Migration {

	public function up()
	{
		Schema::create('group_users', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->bigInteger('user_id')->unsigned();
			$table->bigInteger('group_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('group_users');
	}
}
