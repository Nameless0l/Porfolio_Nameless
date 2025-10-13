<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'description',
        'order'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Create a slug when the name is set
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    // Get published posts in this category
    public function publishedPosts()
    {
        return $this->posts()->where('status', 'published')->orderBy('published_at', 'desc');
    }

    // Scope for ordered categories
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')
                     ->orderBy('name', 'asc');
    }
}
