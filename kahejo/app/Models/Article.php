<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image_path',
        'reading_time',
        'published_at',
        'content',
        'description',
    ];
}
