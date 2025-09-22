<?php

// app/Models/AboutpageSection.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutpageSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_key',
        'heading',
        'subtitle',
        'description',
        'image',
        'bg_image',
        'video_url',
        'button_text',
        'button_url',
        'is_active',
    ];
}
