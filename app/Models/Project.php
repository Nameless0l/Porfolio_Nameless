<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'long_description',
        'image',
        'link',
        'github_link',
        'type',
        'is_featured',
        'technologies'
    ];

    protected $casts = [
        'technologies' => 'array',
        'is_featured' => 'boolean',
    ];

    // Create a slug when the title is set
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    // Get project URL
    public function getUrlAttribute()
    {
        return route('projects.show', $this->slug);
    }

    // Scope for personal projects
    public function scopePersonal($query)
    {
        return $query->where('type', 'personal');
    }

    // Scope for professional projects
    public function scopeProfessional($query)
    {
        return $query->where('type', 'professional');
    }

    // Scope for academic projects
    public function scopeAcademic($query)
    {
        return $query->where('type', 'academic');
    }

    // Scope for featured projects
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
