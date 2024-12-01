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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Ссылка на пользователя
            $table->foreignId('trip_id')->constrained()->cascadeOnDelete(); // Ссылка на поездку
            $table->unsignedTinyInteger('rating'); // Оценка (1-5)
            $table->text('comment')->nullable(); // Текст отзыва
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
