<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 👉 If you want fake users, uncomment this
        // \App\Models\User::factory(10)->create();

        // 👉 No need to create test@example.com again, remove it!

        $this->call([
            ContactInfoSeeder::class,
        ]);
          $this->call([
        RoleSeeder::class,
        ContactInfoSeeder::class,
    ]);
       $this->call([
        PermissionsSeeder::class,
        ContactInfoSeeder::class, // keep your contact info seeder
    ]);
    }
}
