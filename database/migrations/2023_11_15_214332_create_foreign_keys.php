<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration {

	public function up()
	{


		Schema::table('favourites', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
      ->onDelete("cascade");

		});


		Schema::table('country_translations', function(Blueprint $table) {
			$table->foreign('country_id')->references('id')->on('countries')
      ->onDelete("cascade");

		});

		Schema::table('devices', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
      ->onDelete("cascade");

		});


		Schema::table('notifications', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
      ->onDelete("cascade");

		});

		Schema::table('providers', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
      ->onDelete("cascade");

		});





	}

	public function down()
	{


		Schema::table('favourites', function(Blueprint $table) {
			$table->dropForeign('favourites_user_id_foreign');
		});


		Schema::table('devices', function(Blueprint $table) {
			$table->dropForeign('devices_user_id_foreign');
		});



		Schema::table('notifications', function(Blueprint $table) {
			$table->dropForeign('notifications_user_id_foreign');
		});

		Schema::table('providers', function(Blueprint $table) {
			$table->dropForeign('providers_user_id_foreign');
		});





	}
}
