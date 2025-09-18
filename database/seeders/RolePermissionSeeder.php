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
        // 1. Define permissions
        $permissions = [
            'create projects', 'edit projects', 'delete projects', 'view projects',
            'create blogs', 'edit blogs', 'delete blogs', 'view blogs',
            'create services', 'edit services', 'delete services', 'view services',
            'create portfolio', 'edit portfolio', 'delete portfolio', 'view portfolio',
        ];

        // 2. Create permissions
        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm, 'guard_name' => 'web']);
        }

        // 3. Create roles
        $admin   = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $editor  = Role::firstOrCreate(['name' => 'editor', 'guard_name' => 'web']);
        $viewer  = Role::firstOrCreate(['name' => 'viewer', 'guard_name' => 'web']);

        // 4. Assign all permissions to admin
        $admin->syncPermissions(Permission::all());

        // 5. Assign limited permissions to editor (example)
        $editor->syncPermissions([
            'create projects', 'edit projects', 'view projects',
            'create blogs', 'edit blogs', 'view blogs',
            'create services', 'edit services', 'view services',
            'create portfolio', 'edit portfolio', 'view portfolio',
        ]);

        // 6. Assign only view permissions to viewer
        $viewer->syncPermissions([
            'view projects', 'view blogs', 'view services', 'view portfolio'
        ]);

        // 7. Create default admin user
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'], // 👈 change this
            [
                'name' => 'Super Admin',
                'password' => bcrypt('password123'), // 👈 change this
            ]
        );

        // 8. Assign admin role
        $adminUser->assignRole($admin);
    }
}
