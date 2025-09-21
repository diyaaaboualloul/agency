<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomeSection;

class HomeSectionsSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            [
                'section_key' => 'hero',
                'heading'     => 'A creative design studio',
                'description' => 'We\'re a creative design studio specializing in meeting the needs of the new generation. We offer innovative and cutting-edge design solutions to help our clients stand out in today\'s fast-paced world.',
                'bg_image'    => null, // you can upload via admin later
                'image'       => null,
                'button_text' => 'Book a free consultation',
                'button_url'  => '/contact',
                'is_active'   => true,
            ],
            [
                'section_key' => 'services',
                'heading'     => 'We provide effective design solutions',
                'description' => 'From UI/UX to graphic design, we deliver tailored solutions that enhance usability, branding, and client satisfaction.',
                'bg_image'    => null,
                'image'       => null,
                'is_active'   => true,
            ],
            [
                'section_key' => 'about',
                'heading'     => 'We make your business stand out',
                'description' => 'We work closely with our clients to know their objectives, target audience, unique needs, and deliver practical design solutions.',
                'bg_image'    => null,
                'image'       => null,
                'is_active'   => true,
            ],
            [
                'section_key' => 'projects',
                'heading'     => 'Have a wide range of creative projects',
                'description' => 'Explore our portfolio showcasing diverse design solutions for businesses across industries.',
                'bg_image'    => null,
                'image'       => null,
                'is_active'   => true,
            ],
            [
                'section_key' => 'process',
                'heading'     => 'Our high-quality working processes',
                'description' => 'We focus at every stage on effective communication, collaboration, and ensuring the final design meets client goals.',
                'bg_image'    => null,
                'image'       => null,
                'is_active'   => true,
            ],
        ];

        foreach ($sections as $section) {
            HomeSection::updateOrCreate(
                ['section_key' => $section['section_key']],
                $section
            );
        }
    }
}
