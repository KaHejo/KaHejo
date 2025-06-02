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
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            //achievement is basicly a badge that can be earned by users
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->string('icon')->nullable(); // Path to the icon image
            $table->string('category')->nullable(); // Category of the achievement (e.g., energy, water, waste)
            $table->integer('points')->default(0); // Points awarded for earning this achievement
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
