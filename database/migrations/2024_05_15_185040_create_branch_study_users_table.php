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
        Schema::create('branch_study_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("study_id")->unsigned();
            $table->foreign('study_id')->references('id')->on('studies')->onDelete("cascade");
            $table->bigInteger("branch_id")->unsigned();
            $table->foreign('branch_id')->references('id')->on('branch_studies')->onDelete("cascade");
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
        Schema::dropIfExists('branch_study_users');
    }
};
