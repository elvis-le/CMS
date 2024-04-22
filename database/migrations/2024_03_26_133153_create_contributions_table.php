<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contributions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('academicYear_id');
            $table->string('title');
            $table->string('content', 5000);
            $table->string('backgroundImage');
            $table->dateTime('submission_date');
            $table->enum('condition', ['pending', 'approved', 'rejected'])->default('pending');
            $table->json('location');
            $table->integer('status')->default(0);
            $table->tinyInteger('allowGuest')->default(false);


            // Define foreign key constraints
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('academicYear_id')->references('id')->on('academicYear');

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
