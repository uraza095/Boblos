<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chef extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'role',
        'description',
        'image',
        'facebook_url',
        'instagram_url',
        'status',
        'display_order',
    ];
}
