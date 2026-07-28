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
        $tables = ['blogs', 'menu_items', 'menu_categories', 'pages'];

        foreach ($tables as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->string('seo_title')->nullable();
                $table->text('seo_description')->nullable();
                $table->text('seo_keywords')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = ['blogs', 'menu_items', 'menu_categories', 'pages'];

        foreach ($tables as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->dropColumn(['seo_title', 'seo_description', 'seo_keywords']);
            });
        }
    }
};
