<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->integer('display_order')->nullable();
            $table->string('image')->nullable();
            $table->string('alt_image')->nullable();
            $table->json('slug')->nullable();
            $table->enum('status', ['published', 'inactive'])->default('published');
            $table->boolean('home')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
