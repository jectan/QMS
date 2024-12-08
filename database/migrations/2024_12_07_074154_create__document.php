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
            $table->integer('docTypeID')->index();
            $table->integer('docRefCode');
            $table->integer('docTitle');
            $table->date('effectiveDate');
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