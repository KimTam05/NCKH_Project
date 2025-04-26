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
        Schema::create('work_experience', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->unsignedBigInteger('user_account_id'); // Foreign Key to user_account
            $table->string('job_title', 100);
            $table->string('company_name', 100);
            $table->date('start_date');
            $table->date('end_date')->nullable(); // Nullable for current jobs
            $table->boolean('is_current_job')->default(false); // Whether the job is ongoing
            $table->text('job_description')->nullable();
            $table->timestamps();

            // Foreign Key Constraint
            $table->foreign('user_account_id')
                  ->references('id')
                  ->on('user_account')
                  ->onDelete('cascade'); // Cascade delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_experience');
    }
};