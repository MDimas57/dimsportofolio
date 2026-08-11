<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_title',
        'name',
        'bio',
        'highlights',
        'cta_primary_text',
        'cta_primary_link',
        'cv_file_path',
        'profile_image',
        'experience_years',
        'projects_completed',
        'happy_clients',
        'bg_image', // Tambahkan ini untuk mendukung kolom bg_image
    ];

    // PENTING: Tambahkan bagian ini!
    protected $casts = [
        'highlights' => 'array',
    ];
}