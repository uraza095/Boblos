<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesTarget extends Model
{
    protected $fillable = [
        'date',
        'food_gross_sale',
        'food_discounts',
        'food_complimentary',
        'food_net_sale',
        'other_tax_income',
        'other_service_charges',
        'other_decor_income',
        'other_total_sale',
    ];
}
