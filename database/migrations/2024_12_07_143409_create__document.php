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
        Schema::create('Document', function (Blueprint $table) {
            $table->id('docID')->autoIncrement()->primary();
            $table->unsignedBigInteger('docTypeID')->index();
            $table->integer('docRefCode');
            $table->integer('docTitle');
            $table->date('effectiveDate');
            $table->foreign('docTypeID')->references('docTypeID')->on('DocType');
        });

        DB::statement("ALTER TABLE Document ADD docFile MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Document');
    }
};