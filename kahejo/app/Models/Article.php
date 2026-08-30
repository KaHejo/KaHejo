<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $image_path
 * @property int $reading_time
 * @property string|null $published_at
 * @property string $content
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @mixin \Eloquent
 */
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
