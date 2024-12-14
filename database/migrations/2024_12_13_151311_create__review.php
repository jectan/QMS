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
        Schema::create('Review', function (Blueprint $table) {
            $table->id('reviewID')->autoIncrement()->primary();
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('requestID');
            $table->string('reviewComment');
            $table->date('reviewDate');
            $table->boolean('status');
            $table->foreign('userID')->references('userID')->on('User');
            $table->foreign('requestID')->references('requestID')->on('RequestDocument');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Review');
    }
};
