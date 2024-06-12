<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeaturesTable extends Migration {

	public function up()
	{
		Schema::create('features', function(Blueprint $table) {
      $table->id();
			$table->timestamps();
			$table->string('name');
			$table->text('desciption')->nullable();
      $table->string("icon");
		});
	}

	public function down()
	{
		Schema::drop('features');
	}
}
