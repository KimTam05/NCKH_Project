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
            $table->bigint('user_type_id')->unsigned();
            $table->string('email');
            $table->string('password');
            $table->date('date_of_birth');
            $table->bpchar('gender', 1);
            $table->bpchar('is_active', 1);
            $table->string('contact_number', 12);
            $table->text('user_image');
            $table->date('registration_date')->default(now());
            $table->foreign('user_type_id')->references('user_type')->on('id');
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
