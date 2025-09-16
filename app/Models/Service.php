<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',   // ✅ allow mass assignment
    ];

    // ...
public function projects()
{
    return $this->hasMany(\App\Models\Project::class);
}

}