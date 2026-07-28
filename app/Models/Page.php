<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    public function sections()
    {
        return $this->hasMany(PageSection::class, 'page_id');
    }
}
