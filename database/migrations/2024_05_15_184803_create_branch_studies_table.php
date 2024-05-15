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
        Schema::create('branch_studies', function (Blueprint $table) {
            $table->id();
            $table->string("name",50);
            $table->bigInteger("study_id")->unsigned();
            $table->foreign('study_id')->references('id')->on('studies')->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_studies');
    }
};
