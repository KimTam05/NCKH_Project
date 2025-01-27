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
        Schema::create('education_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('user_account_id')->primary();
            $table->string('certificate_degree_name', 50);
            $table->string('major', 50);
            $table->string('insitute_university_name', 50);
            $table->date('starting_date');
            $table->date('completion_date');
            $table->integer('percentage');
            $table->float('cgpa', 8);
            $table->foreign('user_account_id')->references('user_account_id')->on('seeker_profile');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_detail');
    }
};
