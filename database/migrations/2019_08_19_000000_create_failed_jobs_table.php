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
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique(); // Уникальный идентификатор задания
            $table->text('connection'); // Соединение
            $table->text('queue'); // Очередь
            $table->longText('payload'); // Данные задания
            $table->longText('exception'); // Информация об исключении
            $table->timestamp('failed_at')->useCurrent(); // Время сбоя
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('failed_jobs');
    }
};
