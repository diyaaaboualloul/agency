<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Define all modules where you want CRUD
        $modules = ['projects', 'blogs', 'services', 'portfolio'];

        // Create permissions for each module
        foreach ($modules as $module) {
            Permission::firstOrCreate(['name' => "create $module"]);
            Permission::firstOrCreate(['name' => "edit $module"]);
            Permission::firstOrCreate(['name' => "delete $module"]);
            Permission::firstOrCreate(['name' => "view $module"]);
        }

        // Create roles
        $adminRole  = Role::firstOrCreate(['name' => 'admin']);
        $editorRole = Role::firstOrCreate(['name' => 'editor']);
        $viewerRole = Role::firstOrCreate(['name' => 'viewer']);

        // Assign all permissions to admin
        $adminRole->givePermissionTo(Permission::all());

        // Assign only some modules to editor (example: projects + blogs)
        $editorRole->givePermissionTo([
            'create projects', 'edit projects', 'delete projects', 'view projects',
            'create blogs', 'edit blogs', 'delete blogs', 'view blogs',
        ]);

        // Viewer role: only view permissions
        foreach ($modules as $module) {
            $viewerRole->givePermissionTo("view $module");
        }
    }
}
