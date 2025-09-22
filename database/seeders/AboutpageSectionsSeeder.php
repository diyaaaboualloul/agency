<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutpageSection;

class AboutpageSectionsSeeder extends Seeder
{
    public function run(): void
    {
        AboutpageSection::updateOrCreate(
            ['section_key' => 'hero'],
            [
                'heading'     => 'About Our Agency',
                'subtitle'    => 'Who we are & what we stand for.',
                'description' => 'We are committed to innovation, creativity, and excellence in every project.',
                'bg_image'    => 'assets/images/seeders/homeabout.jpg',
                'button_text' => 'Our Services',
                'button_url'  => '/services',
                'is_active'   => true,
            ]
        );

        AboutpageSection::updateOrCreate(
            ['section_key' => 'mission'],
            [
                'heading'     => 'Our Mission',
                'description' => 'Deliver outstanding digital solutions to empower businesses worldwide.',
                'image'       => 'assets/images/seeders/mission.jpg',
                'is_active'   => true,
            ]
        );

        AboutpageSection::updateOrCreate(
            ['section_key' => 'vision'],
            [
                'heading'     => 'Our Vision',
                'description' => 'To be the most trusted digital partner, helping brands thrive in the digital era.',
                'image'       => 'assets/images/seeders/vision.jpg',
                'is_active'   => true,
            ]
        );
    }
}
