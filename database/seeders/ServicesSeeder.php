<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['name' => 'UI/UX Design', 'description' => 'Design user-friendly interfaces and experiences for web & mobile.'],
            ['name' => 'Graphic Design', 'description' => 'Branding, print, marketing assets, and visual identity.'],
            ['name' => 'Web Design', 'description' => 'Modern, responsive websites that convert.'],
            ['name' => 'Motion Graphics', 'description' => 'Animated visuals for ads, promos, and product explainers.'],
        ];

        foreach ($items as $item) {
            Service::updateOrCreate(
                ['name' => $item['name']],
                ['description' => $item['description']]
            );
        }
    }
}
