<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('academicstatus_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("academicstatus_id")->unsigned();
            $table->foreign('academicstatus_id')->references('id')->on('academicstatuses')->onDelete("cascade");

            $table->bigInteger("user_id")->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academicstatus_users');
    }
};
