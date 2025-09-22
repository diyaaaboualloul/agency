<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomepageSection;

class HomepageSectionsSeeder extends Seeder
{
    public function run(): void
    {
        // Hero Section
        HomepageSection::updateOrCreate(
            ['section_key' => 'hero'],
            [
                'heading'     => 'Welcome to Our Agency',
                'subtitle'    => 'We build digital solutions that grow your business.',
                'description' => 'A creative digital agency focused on delivering exceptional results through design, development, and strategy.',
                'bg_image'    => 'assets/images/seeders/homehero.jpg',
                'button_text' => 'Get Started',
                'button_url'  => '/contact',
                'is_active'   => true,
            ]
        );

        // About Section
        HomepageSection::updateOrCreate(
            ['section_key' => 'about'],
            [
                'heading'     => 'Who We Are',
                'subtitle'    => 'Your trusted digital partner.',
                'description' => 'We are a passionate team of designers, developers, and strategists helping businesses create lasting impact through digital experiences.',
                'image'       => 'assets/images/seeders/homeabout.jpg',
                'button_text' => 'Learn More',
                'button_url'  => '/about',
                'is_active'   => true,
            ]
        );
    }
}
