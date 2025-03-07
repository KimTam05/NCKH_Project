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
        Schema::create('user_account', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_type_id');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('date_of_birth');
            $table->boolean('gender', 1);
            $table->boolean('is_active', 1);
            $table->string('contact_number', 12);
            $table->string('address')->candidate();
            $table->text('user_image');
            $table->string('profile_url')->unique();
            $table->date('registration_date')->default(now());
            $table->foreign('user_type_id')->references('id')->on('user_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_account');
    }
};
