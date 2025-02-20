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
        Schema::create('company', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('company_name');
            $table->string('profile_description');
            $table->date('establishment_date');
            $table->string('company_website_url');
            $table->string('company_email')->unique();
            $table->foreign('id')->references('id')->on('user_account');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company');
    }
};
