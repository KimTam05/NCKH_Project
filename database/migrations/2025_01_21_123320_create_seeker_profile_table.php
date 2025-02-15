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
        Schema::create('seeker_profile', function (Blueprint $table) {
            $table->unsignedBigInteger('user_account_id')->primary();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('contact_email');
            $table->string('contact_phone', 20);
            $table->text('file_cv')->nullable();
            $table->foreign('user_account_id')->references('id')->on('user_account');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seeker_profile');
    }
};
