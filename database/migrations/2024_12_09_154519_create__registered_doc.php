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
        Schema::create('RegisteredDoc', function (Blueprint $table) {
            $table->id('regDocID')->autoIncrement()->primary();
            $table->unsignedBigInteger('requestID');
            $table->date('effectivityDate');
            $table->foreign('requestID')->references('requestID')->on('RequestDocument');
        });

        DB::statement("ALTER TABLE RegisteredDoc ADD docFile MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('RegisteredDoc');
    }
};
