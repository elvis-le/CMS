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
        Schema::create('academicYear', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('detail', 5000)->nullable();
            $table->dateTime('publish_date');
            $table->date('startDate');
            $table->date('deadline');
            $table->date('finalDeadline');
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('faculty_id');

            $table->timestamps();


            $table->foreign('faculty_id')->references('id')->on('faculties');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('magazine');
    }
};
