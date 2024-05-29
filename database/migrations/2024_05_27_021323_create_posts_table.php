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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('image_path')->nullable();
            $table->foreignId('author_id')->constrained(
                table: 'users',
                indexName: 'posts_user_id'
            )->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('categories_id')->constrained(
                table: 'categories',
                indexName: 'posts_categories_id'
            )->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('campus_id')->constrained(
                table: 'campus',
                indexName: 'posts_campus_id'
            )->onUpdate('cascade')->onDelete('restrict');
            // $table->foreignId('categories_id')->references('id')->on('categories');
            // $table->foreignId('campus_id')->references('id')->on('campus');
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
