<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $table = 'certifications';

    protected $fillable = [
        'title',
        'issuer',
        'issue_date',
        'front_image',
        'back_image',
        'description',
        'credential_url',
        'sort_order',
    ];
}
