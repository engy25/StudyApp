<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWisdomsTable extends Migration {

	public function up()
	{
		Schema::create('wisdoms', function(Blueprint $table) {
      $table->id();
			$table->timestamps();
			$table->text('title');
			$table->string('owner');
		});
	}

	public function down()
	{
		Schema::drop('wisdoms');
	}
}
