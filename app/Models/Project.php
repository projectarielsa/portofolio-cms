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
        'cover_image',
        'gallery',
        'category',
        'description',
        'content',
        'tech_stack',
        'demo_url',
        'repo_url',
        'is_featured',
        'status',
        'published_at',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
        'gallery' => 'array',
    ];

    protected static function booted(): void
    {
        static::creating(function (Project $project) {
            if (blank($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function getTechListAttribute(): array
    {
        if (blank($this->tech_stack)) {
            return [];
        }

        return array_map('trim', explode(',', $this->tech_stack));
    }

    public function getGalleryListAttribute(): array
    {
        return $this->gallery ?? [];
    }
}
