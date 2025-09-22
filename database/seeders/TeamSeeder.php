<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        Team::truncate(); // Clear old data (optional for dev)

        Team::create([
            'name' => 'John Doe',
            'title_job' => 'Chief Executive Officer',
            'image' => 'teams/john.jpg',
            'facebook_link' => 'https://facebook.com/johndoe',
            'insta_link' => 'https://instagram.com/johndoe',
        ]);

        Team::create([
            'name' => 'Sarah Smith',
            'title_job' => 'Marketing Manager',
            'image' => 'teams/sarah.jpg',
            'facebook_link' => 'https://facebook.com/sarahsmith',
            'insta_link' => 'https://instagram.com/sarahsmith',
        ]);

        Team::create([
            'name' => 'Ali Ahmed',
            'title_job' => 'Lead Developer',
            'image' => 'teams/ali.jpg',
            'facebook_link' => 'https://facebook.com/aliahmed',
            'insta_link' => 'https://instagram.com/aliahmed',
        ]);
    }
}
