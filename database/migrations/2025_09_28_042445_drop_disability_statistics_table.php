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
        Schema::dropIfExists('disability_statistics');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('disability_statistics', function (Blueprint $table) {
            $table->id();
            // kung gusto mong ibalik later, lagay mo ulit dito yung dating columns
            $table->timestamps();
        });
    }
};
