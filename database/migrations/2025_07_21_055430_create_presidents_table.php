<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('presidents', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('barangay_id');
            $table->timestamps();

            // Foreign key constraint (optional, only if you have a barangays table)
            // $table->foreign('barangay_id')->references('id')->on('barangays')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('presidents');
    }
};
