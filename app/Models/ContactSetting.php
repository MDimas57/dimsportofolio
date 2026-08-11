<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    protected $fillable = [
        'email',
        'phone_number',
        'whatsapp_message',
        'instagram_url',
        'tiktok_url',
        'github_url',
        'linkedin_url',
        'youtube_url',
    ];
}