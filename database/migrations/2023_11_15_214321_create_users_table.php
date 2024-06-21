<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('fullname', 50)->nullable();
      $table->string("nickname",50)->nullable();
			$table->string('image', 100)->nullable();
			$table->date('dob')->nullable();
			$table->string('email', 60);
			$table->string('phone', 50)->nullable();
			$table->string('country_code', 10)->nullable();
      $table->bigInteger("country_id")->nullable()->unsigned();
			$table->string('otp', 4)->nullable();
			$table->tinyInteger('is_active')->default('0');
			$table->string('updated_phone', 50)->nullable();
			$table->string('updated_country_code', 10)->nullable();
      $table->string('updated_email',60)->nullable();
      $table->timestamp('phone_verified_at')->nullable();
      $table->rememberToken();
      $table->string('password')->nullable();
      $table->string('profile_bio')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}
