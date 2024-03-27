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
            $table->string('megazine_name');
            $table->string('megazine_image')->nullable();
            $table->text('megazine_detail')->nullable();
            $table->date('publish_date');
            $table->datetimes('deadline');

            $table->timestamps();
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
