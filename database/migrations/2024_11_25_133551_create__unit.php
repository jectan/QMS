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
        Schema::create('Unit', function (Blueprint $table) {
            $table->id('unitID')->autoIncrement()->primary();
            $table->string('unitName');
            $table->unsignedBigInteger('divID');
            $table->foreign('divID')->references('divID')->on('Division');
            $table->boolean('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};