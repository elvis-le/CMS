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
        Schema::create('magazine', function (Blueprint $table) {
            $table->id();
            $table->string('magazine_name');
            $table->string('magazine_image')->nullable();
            $table->text('magazine_detail')->nullable();
            $table->unsignedBigInteger('faculty_id')->nullable();
            $table->dateTime('publish_date');
            $table->date('deadline');
            $table->integer('status')->default(0);

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
