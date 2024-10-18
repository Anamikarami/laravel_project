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
        Schema::create('user_setting', function (Blueprint $table) {
            $table->id();
            $table->string('language');
            $table->string('home_view');
            $table->string('time_zone');
            $table->string('time_format')->default('13','1 PM');
            $table->string('date')->default('DD-MM-YYYY','MM-DD-YYYY');
            $table->string('weekend');
            $table->string('next_week');
            $table->timestamps();
            $table->string('users_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_setting');
    }
};
