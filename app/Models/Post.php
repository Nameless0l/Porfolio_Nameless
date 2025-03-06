<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'excerpt',
        'category_id',
        'featured_image',
        'status',
        'published_at',
        'read_time'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Create a slug when the title is set
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    // Generate excerpt from body if not provided
    public function setBodyAttribute($value)
    {
        $this->attributes['body'] = $value;

        if (!isset($this->attributes['excerpt'])) {
            $this->attributes['excerpt'] = Str::limit(strip_tags($value), 150);
        }

        // Calculate read time (roughly 200 words per minute)
        $wordCount = str_word_count(strip_tags($value));
        $this->attributes['read_time'] = ceil($wordCount / 200);
    }

    // Scope to get published posts
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
                     ->where('published_at', '<=', now())
                     ->orderBy('published_at', 'desc');
    }

    // Get formatted published date
    public function getPublishedDateAttribute()
    {
        return $this->published_at ? $this->published_at->format('F d, Y') : null;
    }

    // Get post URL
    public function getUrlAttribute()
    {
        return route('blog.show', $this->slug);
    }
}
