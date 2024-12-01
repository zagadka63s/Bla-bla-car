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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Создатель поездки
            $table->string('departure_location', 100); // Место отправления
            $table->string('arrival_location', 100); // Место прибытия
            $table->date('departure_date'); // Дата отправления
            $table->time('departure_time'); // Время отправления
            $table->decimal('price', 8, 2); // Цена
            $table->integer('available_seats'); // Доступные места
            $table->string('phone', 15); // Контактный телефон
            $table->text('additional_info')->nullable(); // Дополнительная информация
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
