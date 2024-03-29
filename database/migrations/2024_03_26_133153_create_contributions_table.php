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
        Schema::create('contributions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('magazine_id');
            $table->string('content');
            $table->string('image')->nullable();
            $table->dateTime('submission_date');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');

            // Define foreign key constraints
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('magazine_id')->references('id')->on('magazine');

            // Add timestamps for created_at and updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contributions');
    }
};
