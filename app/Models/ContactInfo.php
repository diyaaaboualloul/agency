<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $fillable = [
        'agency_name','email','phone','whatsapp','address_line1','address_line2',
        'city','state','postal_code','country','map_embed_url','social_links'
    ];

    protected $casts = [
        'social_links' => 'array',
    ];
}
