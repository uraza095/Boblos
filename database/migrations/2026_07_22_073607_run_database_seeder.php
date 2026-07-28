<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create Admin account directly inside migration
        \App\Models\User::updateOrCreate(
            ['email' => 'admin@fignolive.pk'],
            [
                'name' => 'Administrator',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        Artisan::call('db:seed', ['--force' => true]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
