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
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable'); // Тип модели и ID
            $table->string('name'); // Название токена
            $table->string('token', 64)->unique(); // Уникальный токен
            $table->text('abilities')->nullable(); // Возможности токена
            $table->timestamp('last_used_at')->nullable(); // Последнее использование
            $table->timestamp('expires_at')->nullable(); // Истечение срока действия
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
