<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chefs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('status')->default('active'); // active, inactive
            $table->integer('display_order')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chefs');
    }
};
