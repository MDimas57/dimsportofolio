<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;
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