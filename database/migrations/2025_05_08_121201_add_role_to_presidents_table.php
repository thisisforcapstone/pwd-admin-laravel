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
    Schema::table('presidents', function (Blueprint $table) {
        $table->string('role')->nullable(); // Add this line to add the 'role' column
    });
}

public function down()
{
    Schema::table('presidents', function (Blueprint $table) {
        $table->dropColumn('role'); // This removes the 'role' column if the migration is rolled back
    });
}

};
