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
        Schema::create('experience_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('user_account_id')->primary();
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('is_current_job');
            $table->string('job_name', 50);
            $table->string('company_name', 50);
            $table->string('job_location_city', 50);
            $table->string('job_location_state', 50);
            $table->string('job_location_country', 50);
            $table->text('description');
            $table->foreign('user_account_id')->references('user_account_id')->on('seeker_profile');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experience_detail');
    }
};
