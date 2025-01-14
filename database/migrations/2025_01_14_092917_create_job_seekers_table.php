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
        Schema::create('job_seekers', function (Blueprint $table) {
            $table->id();
            $table->string('job_seeker_name');
            $table->bit('gender');
            $table->text('address');
            $table->string('contactNumber')->unique();
            $table->string('emailAddress')->unique();
            $table->text('skills');
            $table->text('work_experience');
            $table->text('education');
            $table->text('certifications');
            $table->text('projects');
            $table->text('carrier_objectives');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_seekers');
    }
};
