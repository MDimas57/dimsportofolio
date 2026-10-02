<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_logo',
    ];

    // Accessor untuk mendapatkan URL lengkap gambar logo
    public function getLogoUrlAttribute(): ?string
    {
        if ($this->site_logo && Storage::disk('public')->exists($this->site_logo)) {
            return Storage::url($this->site_logo);
        }

        return null;
    }

    // Accessor fallback inisial jika gambar logo belum diunggah
    public function getFormattedInitialAttribute(): string
    {
        $words = explode(' ', trim($this->site_name ?? 'MD'));
        if (count($words) >= 2) {
            return strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
        }

        return strtoupper(substr($this->site_name ?? 'MD', 0, 2));
    }
}