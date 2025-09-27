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
        $table->dateTime('event_date')->nullable()->change();
    });
}

public function down()
{
    Schema::table('announcements', function (Blueprint $table) {
        $table->dateTime('event_date')->nullable(false)->change();
    });
}
};
