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
        Schema::create('register_events', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('code_student', 11)->nullable();
            $table->string('class')->nullable();
            $table->string('faculty')->nullable();
            $table->string('phone', 13)->nullable();
            $table->string('email')->unique();
            $table->bigInteger('event_id')->nullable();
            $table->integer('type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('register_events');
    }
};
