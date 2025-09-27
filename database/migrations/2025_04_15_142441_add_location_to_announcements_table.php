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
    Schema::table('announcements', function (Blueprint $table) {
        $table->string('location')->nullable(false)->change(); // Make location non-nullable
    });
}

public function down()
{
    Schema::table('announcements', function (Blueprint $table) {
        $table->string('location')->nullable()->change(); // Revert to nullable if needed
    });
}
};
