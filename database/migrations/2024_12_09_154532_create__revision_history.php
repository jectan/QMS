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
        Schema::create('RevisionHistory', function (Blueprint $table) {
            $table->id('revHistoryID')->autoIncrement()->primary();
            $table->unsignedBigInteger('regDocID');
            $table->integer('revNo');
            $table->foreign('regDocID')->references('regDocID')->on('RegisteredDoc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('RevisionHistory');
    }
};
