<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservation_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservation_id')->nullable();
            $table->string('reservation_name')->nullable();
            $table->string('action'); // created, status_updated, deleted
            $table->text('details');
            $table->string('performed_by'); // Customer, Admin Name, System
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservation_logs');
    }
};
