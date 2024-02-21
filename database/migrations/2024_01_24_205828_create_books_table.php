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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('author');
            $table->string('publisher')->nullable();
            $table->string('language')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('file_format')->nullable();
            $table->string('file_url')->nullable();
            $table->string('isbn')->unique();
            $table->string('total_pages')->nullable();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('genre_id')->constrained('genres')->onDelete('cascade');
            $table->date('publication_date');
            $table->text('description')->nullable();
            $table->text('views')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
