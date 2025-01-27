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
        Schema::create('user_log', function (Blueprint $table) {
            $table->unsignedBigInteger('user_account_id')->primary();
            $table->date('last_login_date');
            $table->date('last_job_apply_date');
            $table->json('save_job');
            $table->foreign('user_account_id')->references('id')->on('user_account');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_log');
    }
};
