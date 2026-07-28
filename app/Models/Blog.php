<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'author_name',
        'tags',
        'status',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    public function getTagsArrayAttribute()
    {
        return $this->tags ? array_map('trim', explode(',', $this->tags)) : [];
    }
}
