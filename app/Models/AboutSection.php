<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'badge',
        'title',
        'description',
        'name',
        'location',
        'email',
        'availability_status',
        'image',
        'button_text',
        'button_link',
    ];
}