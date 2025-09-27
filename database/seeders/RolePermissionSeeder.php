<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Clear cache
        app(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        // --- Permissions ---

        $permissions = [
            // Projects
            'create projects', 'edit projects', 'delete projects', 'view projects',

            // Blogs
            'create blogs', 'edit blogs', 'delete blogs', 'view blogs',

            // Services
            'create services', 'edit services', 'delete services', 'view services',

            // Teams
            'create teams', 'edit teams', 'delete teams', 'view teams',

            // Home Sections
            'view home', 'edit home',

            // About Sections
            'view about', 'edit about',

            // Contact Info
            'edit contact info',

            // Contact Messages
            'view messages', 'delete messages',
        ];

        // Create permissions if not exists
        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm, 'guard_name' => 'web']);
        }

        // --- Roles ---
        $admin   = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $editor  = Role::firstOrCreate(['name' => 'editor', 'guard_name' => 'web']);
        $viewer  = Role::firstOrCreate(['name' => 'viewer', 'guard_name' => 'web']);

        // --- Assign Permissions ---
        // Admin → everything
        $admin->syncPermissions(Permission::all());

        // Editor → only content management
        $editor->syncPermissions([
            'create projects', 'edit projects', 'view projects',
            'create blogs', 'edit blogs', 'view blogs',
            'create services', 'edit services', 'view services',
            'create teams', 'edit teams', 'delete teams', 'view teams',
            'view home', 'edit home',
            'view about', 'edit about',
        ]);

        // Viewer → frontend only (no admin permissions)
        $viewer->syncPermissions([
            'view projects', 'view blogs', 'view services', 'view teams',
            'view home', 'view about',
        ]);

        // --- Default Super Admin user ---
        $adminUser = User::firstOrCreate(
            ['email' => 'diyaa@gmail.com'], // change if needed
            [
                'name' => 'Admin',
                'password' => bcrypt('123456789'), // change if needed
            ]
        );

        $adminUser->assignRole($admin);

        // Clear cache again
        app(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
