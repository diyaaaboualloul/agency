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

        // Call all seeders here in order
        $this->call([
            ContactInfoSeeder::class,      // your existing contact info
            RolePermissionSeeder::class,   // roles, permissions, and admin user
        ]);
   
        $this->call([
        HomepageSectionsSeeder::class,
    ]);
    $this->call([
    AboutpageSectionsSeeder::class,
]);

    }
}
