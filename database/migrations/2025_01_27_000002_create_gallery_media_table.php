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
        Schema::create('gallery_media', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->string('original_name');
            $table->string('file_path');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('category')->default('kegiatan');
            $table->json('tags')->nullable();
            $table->date('media_date')->nullable();
            $table->string('photographer')->nullable();
            $table->string('location')->nullable();
            $table->enum('media_type', ['image', 'video'])->default('image');
            $table->string('file_size')->nullable();
            $table->string('dimensions')->nullable(); // width x height
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            
            // Indexes
            $table->index(['category', 'is_published']);
            $table->index(['media_type', 'is_published']);
            $table->index('sort_order');
            $table->unique('filename');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_media');
    }
};
