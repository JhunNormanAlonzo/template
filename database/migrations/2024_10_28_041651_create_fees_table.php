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
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('year_level_id');
            $table->unsignedBigInteger('school_year_id');
            $table->string('name');
            $table->double('amount',8,2);
            $table->boolean('activation')->default('0');
            $table->timestamps();
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('year_level_id')->references('id')->on('year_levels');
            $table->foreign('school_year_id')->references('id')->on('school_years');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
