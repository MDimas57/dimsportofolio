<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
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
