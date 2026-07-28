<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'thumbnail',
        'display_order',
        'status',
        'show_on_homepage',
        'show_on_home_menu',
        'parent_id',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class, 'category_id')->orderBy('display_order');
    }

    public function parent()
    {
        return $this->belongsTo(MenuCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(MenuCategory::class, 'parent_id')->orderBy('display_order');
    }
}
