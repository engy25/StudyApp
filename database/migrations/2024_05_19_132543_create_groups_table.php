<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupsTable extends Migration {

	public function up()
	{
		Schema::create('groups', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->bigInteger('owner_id')->unsigned();
			$table->string('name');
			$table->bigInteger('category_id')->unsigned();
			$table->string('code');
		});
	}

	public function down()
	{
		Schema::drop('groups');
	}
}
