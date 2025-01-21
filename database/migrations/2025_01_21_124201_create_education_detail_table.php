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
            $table->id('user_account_id');
            $table->string('certificate_degree_name', 50);
            $table->string('major', 50);
            $table->string('insitute_university_name', 50);
            $table->date('starting_date');
            $table->date('completion_date');
            $table->int('percentage', 4);
            $table->float('cgpa', 8);
            $table->foreign('user_account_id')->references('user_account')->on('id');
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
