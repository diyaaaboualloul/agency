<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'title',
        'slug',
        'cover_image',
        'summary',
        'description',
        'client',
        'location',
        'completed_at',
        'is_published',
    ];

    protected $casts = [
        'completed_at' => 'date',
        'is_published' => 'boolean',
    ];

    // Relations
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // Convenience: generate slug if not provided
    protected static function booted()
    {
        static::creating(function (Project $project) {
            if (empty($project->slug)) {
                $base = Str::slug($project->title);
                $slug = $base;
                $i = 2;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $base.'-'.$i++;
                }
                $project->slug = $slug;
            }
        });
    }

    // Optional accessor for full cover URL
    public function getCoverUrlAttribute(): ?string
    {
        return $this->cover_image
            ? asset('storage/' . $this->cover_image)
            : asset('assets/images/placeholder-portfolio.png');
    }
}

