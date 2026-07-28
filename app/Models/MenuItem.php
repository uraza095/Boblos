<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'discounted_price',
        'image',
        'tags',
        'status',
        'display_order',
        'featured',
        'is_special',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'is_special' => 'boolean',
        'price' => 'decimal:2',
        'discounted_price' => 'decimal:2',
    ];

    public function category()
    {
        return $this->belongsTo(MenuCategory::class, 'category_id');
    }
    
    // Get array of tags
    public function getTagsArrayAttribute()
    {
        return $this->tags ? array_map('trim', explode(',', $this->tags)) : [];
    }
}
