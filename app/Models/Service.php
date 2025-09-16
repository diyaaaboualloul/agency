<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];



    // ...
public function projects()
{
    return $this->hasMany(\App\Models\Project::class);
}

}