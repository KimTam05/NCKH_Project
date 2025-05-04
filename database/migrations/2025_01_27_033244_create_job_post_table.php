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
        Schema::create('job_post', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_by_id');
            $table->unsignedBigInteger('job_type_id');
            $table->string('job_title');
            $table->text('job_location');
            $table->date('created_at');
            $table->text('description');
            $table->boolean('is_active');
            $table->date('date_expired');
            $table->float('salary');
            $table->integer('number_of_cv')->default(0);
            $table->string('job_url')->unique();
            $table->foreign('job_type_id')->references('id')->on('job_type');
            $table->foreign('post_by_id')->references('id')->on('company');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_post');
    }
};
