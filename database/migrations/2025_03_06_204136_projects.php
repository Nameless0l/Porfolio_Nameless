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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('long_description')->nullable();
            $table->string('image')->nullable();
            $table->string('link')->nullable();
            $table->string('github_link')->nullable();
            $table->enum('type', ['personal', 'professional', 'academic'])->default('personal');
            $table->boolean('is_featured')->default(false);
            $table->json('technologies')->nullable(); // Store as JSON array of technologies used
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
