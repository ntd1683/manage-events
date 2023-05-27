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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('description')->nullable();
            $table->text('content')->nullable();
            $table->bigInteger('author');
            $table->string('google_sheet')->nullable();
            $table->bigInteger('media_id')->nullable();
            $table->boolean('published')->default(false);
            $table->boolean('accepted')->default(false);
            $table->date('happened_at')->default(date('Y-m-d'));
            $table->timestamp('publish_at')->nullable();
            $table->timestamp('accepted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
