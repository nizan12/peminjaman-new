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
        Schema::create('table_course_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('courses_id')->constrained('courses')->onDelete('cascade')->onUpdate('cascade');
            $table->string('school_year');
            $table->string('class_code');
            $table->string('study_day');
            $table->string('lecture_hours');
            $table->string('rooms');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_course_schedules');
    }
};
