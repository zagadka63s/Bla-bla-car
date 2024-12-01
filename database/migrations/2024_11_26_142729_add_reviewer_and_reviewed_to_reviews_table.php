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
        Schema::table('reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('reviewer_id')->nullable()->after('id'); // ID автора отзыва
            $table->unsignedBigInteger('reviewed_id')->nullable()->after('reviewer_id'); // ID получателя отзыва

            // Настройка внешних ключей
            $table->foreign('reviewer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('reviewed_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Удаление внешних ключей и колонок
            $table->dropForeign(['reviewer_id']);
            $table->dropForeign(['reviewed_id']);
            $table->dropColumn(['reviewer_id', 'reviewed_id']);
        });
    }
};

