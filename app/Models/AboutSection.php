<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_key','title','heading','subtitle','description',
        'image','bg_image','video_url','button_text','button_url',
        'stats','extra','is_active','sort_order',
    ];

    protected $casts = [
        'stats'     => 'array',
        'extra'     => 'array',
        'is_active' => 'boolean',
    ];

    public function scopeActive($q) { return $q->where('is_active', true)->orderBy('sort_order'); }
}
