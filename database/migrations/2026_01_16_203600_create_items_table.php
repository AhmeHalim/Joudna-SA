<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->float('price')->nullable();
            $table->json('short_desc')->nullable();
            $table->integer('display_order')->nullable();
            $table->json('long_desc')->nullable();
            $table->string('image')->nullable();
            $table->string('alt_image')->nullable();
            $table->json('slug')->nullable();
            $table->enum('status', ['published', 'inactive'])->default('published');
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->boolean('recommended')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
