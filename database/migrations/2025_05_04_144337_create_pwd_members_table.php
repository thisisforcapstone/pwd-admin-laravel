<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pwd_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barangay_name');
            $table->string('full_name');
            $table->integer('age');
            $table->string('disability_type');
            $table->timestamps(); // creates created_at and updated_at
            
            // Foreign key constraint
            $table->foreign('barangay_name')->references('id')->on('disability_statistics')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pwd_members');
    }
};