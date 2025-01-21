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
            $table->id('user_account_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->bool('is_current_job');
            $table->string('job_name', 50);
            $table->string('company_name', 50);
            $table->string('job_location_city', 50);
            $table->string('job_location_state', 50);
            $table->string('job_location_country', 50);
            $table->text('description');
            $table->timestamps();
            $table->foreign('user_account_id')->references('user_account')->on('id');
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
