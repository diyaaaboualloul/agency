<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactInfo;

class ContactInfoSeeder extends Seeder
{
    public function run(): void
    {
        ContactInfo::updateOrCreate(
            ['email' => 'diyaaaboualloul@gmail.com'],
            [
                'agency_name'   => 'Aximo Agency',
                'phone'         => '+1 (555) 000-1111',
                'whatsapp'      => '+1 (555) 222-3333',
                'address_line1' => '4132 Thornridge City',
                'city'          => 'New York',
                'state'         => 'NY',
                'postal_code'   => '10001',
                'country'       => 'USA',
                'map_embed_url' => null,
                'social_links'  => json_encode([
                    'twitter'   => 'https://twitter.com/',
                    'facebook'  => 'https://facebook.com/',
                    'instagram' => 'https://instagram.com/',
                    'linkedin'  => 'https://linkedin.com/',
                ]),
            ]
        );
    }
}
