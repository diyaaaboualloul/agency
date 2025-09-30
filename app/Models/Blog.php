<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'short_description',
        'image_path',
        'description',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    public function images()
    {
        return $this->hasMany(BlogImage::class)->orderBy('sort_order');
    }
}
