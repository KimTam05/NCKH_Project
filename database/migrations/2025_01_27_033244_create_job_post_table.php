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
            $table->date('created_at');
            $table->text('description');
            $table->unsignedBigInteger('job_location_id');
            $table->boolean('is_active');
            $table->string('job_title');
            $table->date('date_expired');
            $table->date('date_receiving_applications');
            $table->float('salary');
            $table->unsignedBigInteger('category_id');
            $table->string('file_description');
            $table->foreign('job_type_id')->references('id')->on('job_type');
            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('job_location_id')->references('id')->on('job_location');
            $table->foreign('post_by_id')->references('id')->on('user_account');
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
