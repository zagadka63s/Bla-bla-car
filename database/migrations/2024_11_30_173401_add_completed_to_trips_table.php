<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::table('trips', function (Blueprint $table) {
        $table->boolean('completed')->default(false)->after('additional_info');
    });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
    Schema::table('trips', function (Blueprint $table) {
        $table->dropColumn('completed');
    });
    }

};