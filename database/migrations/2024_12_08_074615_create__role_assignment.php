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
        Schema::create('RoleAssignment', function (Blueprint $table) {
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('roleID');
            $table->foreign('userID')->references('userID')->on('User');
            $table->foreign('roleID')->references('roleID')->on('Role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('RoleAssignment');
    }
};
