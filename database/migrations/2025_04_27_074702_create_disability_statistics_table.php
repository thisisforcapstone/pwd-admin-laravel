<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('disability_statistics', function (Blueprint $table) {
            $table->id();
            
            // Barangay information
            $table->string('barangay_name', 100)->index();
            
            // PWD information
            $table->string('president', 100);
            $table->unsignedInteger('Visual')->default(0)->comment('Count for Visual disability');
            $table->unsignedInteger('Hearing')->default(0)->comment('Count for Hearing disability');
            $table->unsignedInteger('Mobility')->default(0)->comment('Count for Mobility disability');
            
            // Timestamps (place at end as convention)
            $table->timestamps();
            
            // Add indexes for better performance
            $table->index(['barangay_name', 'president']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('disability_statistics');
    }
};