<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('book_tables', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('phone');
            $table->date('date');
            $table->string('time');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('book_tables');
    }
};
