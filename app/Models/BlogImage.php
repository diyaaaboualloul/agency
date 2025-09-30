<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogImage extends Model
{
    protected $fillable = [
        'blog_id',
        'path',
        'caption',
        'sort_order',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
