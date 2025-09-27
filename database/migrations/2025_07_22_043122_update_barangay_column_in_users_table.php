<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('presidents', function (Blueprint $table) {
            // Huwag nang i-drop ang barangay_id kasi dinelete mo na manually
            $table->string('barangay_name')->nullable(); // add mo nalang ito
        });
    }

    public function down(): void
    {
        Schema::table('presidents', function (Blueprint $table) {
            $table->dropColumn('barangay_name');

            // Optional: Ibalik ang barangay_id kung gusto mo sa rollback
            $table->unsignedBigInteger('barangay_id')->nullable();
        });
    }
};
