<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'thumbnail',
        'tech_stack',
        'demo_url',
        'github_url',
        'order',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (Project $project): void {
            if (empty($project->slug) && ! empty($project->title)) {
                $project->slug = Str::slug($project->title);
            }
        });

        static::updating(function (Project $project): void {
            if (empty($project->slug) && ! empty($project->title)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }
}
