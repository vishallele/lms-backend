<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\UserData;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        UserData::factory(20)->create();

        Role::factory()->create([
            'role_name' => 'Admin',
            'role_id' => 'admin',
        ]);

        Role::factory()->create([
            'role_name' => 'Sub Admin',
            'role_id' => 'sub_admin',
        ]);

        Role::factory()->create([
            'role_name' => 'Instructor',
            'role_id' => 'instructor',
        ]);

        Role::factory()->create([
            'role_name' => 'Member',
            'role_id' => 'member',
        ]);

        Permission::factory()->create([
            'permission_name' => 'View Users',
            'permission_id' => 'admin.view.users',
        ]);

        Permission::factory()->create([
            'permission_name' => 'Add Users',
            'permission_id' => 'admin.add.users',
        ]);

        Permission::factory()->create([
            'permission_name' => 'Edit Users',
            'permission_id' => 'admin.edit.users',
        ]);

        Permission::factory()->create([
            'permission_name' => 'Delete Users',
            'permission_id' => 'admin.delete.users',
        ]);

        Permission::factory()->create([
            'permission_name' => 'View Courses',
            'permission_id' => 'admin.view.courses',
        ]);

        Permission::factory()->create([
            'permission_name' => 'Add Courses',
            'permission_id' => 'admin.add.courses',
        ]);

        Permission::factory()->create([
            'permission_name' => 'Edit Courses',
            'permission_id' => 'admin.edit.courses',
        ]);

        Permission::factory()->create([
            'permission_name' => 'Delete Courses',
            'permission_id' => 'admin.delete.courses',
        ]);

        Permission::factory()->create([
            'permission_name' => 'View Payments',
            'permission_id' => 'admin.view.payments',
        ]);

        Permission::factory()->create([
            'permission_name' => 'Edit Payments',
            'permission_id' => 'admin.edit.payments',
        ]);

        Permission::factory()->create([
            'permission_name' => 'Delete Payments',
            'permission_id' => 'admin.delete.payments',
        ]);

        Permission::factory()->create([
            'permission_name' => 'View Configuration',
            'permission_id' => 'admin.view.configuration',
        ]);

        Permission::factory()->create([
            'permission_name' => 'Add Configuration',
            'permission_id' => 'admin.add.configuration',
        ]);

        Permission::factory()->create([
            'permission_name' => 'Edit Configuration',
            'permission_id' => 'admin.edit.configuration',
        ]);

        Permission::factory()->create([
            'permission_name' => 'Delete Configuration',
            'permission_id' => 'admin.delete.configuration',
        ]);

        Permission::factory()->create([
            'permission_name' => 'View Reports',
            'permission_id' => 'admin.view.reports',
        ]);

        Permission::factory()->create([
            'permission_name' => 'Delete Reports',
            'permission_id' => 'admin.delete.reports',
        ]);
    }
}
