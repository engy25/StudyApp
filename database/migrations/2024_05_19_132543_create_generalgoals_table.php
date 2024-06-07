<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGeneralgoalsTable extends Migration {

	public function up()
	{
		Schema::create('generalgoals', function(Blueprint $table) {
      $table->id();
			$table->timestamps();
			$table->string('name');
		});
	}

	public function down()
	{
		Schema::drop('generalgoals');
	}
}
