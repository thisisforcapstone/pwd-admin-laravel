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
    Schema::create('personal_access_tokens', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('token');
        $table->json('abilities')->nullable();
        $table->timestamp('expires_at')->nullable();
        $table->unsignedBigInteger('tokenable_id');
        $table->string('tokenable_type');
        $table->timestamps();

        $table->foreign('tokenable_id')
            ->references('id')
            ->on('admins') // ito ang pangalan ng table ng iyong Admins
            ->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('personal_access_tokens');
}
};
