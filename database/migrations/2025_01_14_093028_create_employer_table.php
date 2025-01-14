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
        Schema::create('employer', function (Blueprint $table) {
            $table->id();
            $table->string('employerName')->unique();
            $table->string('emailAddress')->unique();
            $table->string('phoneNumber', 20)->unique();
            $table->text('address');
            $table->string('industry', 100);
            $table->text('description');
            $table->string('company_size', 50);
            $table->string('website');
            $table->string('contact_person', 100);
            $table->string('contact_email');
            $table->string('contact_phone', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employer');
    }
};
