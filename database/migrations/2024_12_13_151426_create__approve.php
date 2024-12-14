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
        Schema::create('Approve', function (Blueprint $table) {
            $table->id('approveID')->autoIncrement()->primary();
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('requestID');
            $table->string('approveComment');
            $table->date('approveDate');
            $table->foreign('userID')->references('userID')->on('User');
            $table->foreign('requestID')->references('requestID')->on('RequestDocument');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Approve');
    }
};
