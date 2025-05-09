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
        Schema::create('articles', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title');
            $table->text('body'); // Allows HTML content
            $table->timestamps();
            $table->timestamp('start_date')->nullable(); // Optional for scheduling
            $table->timestamp('end_date')->nullable(); // Optional for expiration
            $table->string('contributor_username')->constrained()->onDelete('cascade'); // Should be an email
            // $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
