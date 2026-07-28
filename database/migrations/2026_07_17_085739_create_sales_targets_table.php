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
        Schema::create('sales_targets', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->decimal('food_gross_sale', 12, 2)->default(0);
            $table->decimal('food_discounts', 12, 2)->default(0);
            $table->decimal('food_complimentary', 12, 2)->default(0);
            $table->decimal('food_net_sale', 12, 2)->default(0);
            $table->decimal('other_tax_income', 12, 2)->default(0);
            $table->decimal('other_service_charges', 12, 2)->default(0);
            $table->decimal('other_decor_income', 12, 2)->default(0);
            $table->decimal('other_total_sale', 12, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_targets');
    }
};
