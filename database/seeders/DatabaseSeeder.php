<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Users;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $permissions = [
            'announcement:create',
            'announcement:read',
            'announcement:update',
            'announcement:delete',

            'message:create',
            'message:read',
            'message:update',
            'message:delete',

            'product:create',
            'product:read',
            'product:update',
            'product:delete',

            'user:create',
            'user:read',
            'user:update',
            'user:delete',

            'role:create',
            'role:read',
            'role:update',
            'role:delete',
        ];
        $super_admin = \Spatie\Permission\Models\Role::create([
            'name' => 'Super Admin'
        ]);

        $user = \Spatie\Permission\Models\Role::create([
            'name' => 'User'
        ]);

        foreach ($permissions as $key => $permissionValue){
            $permission = \Spatie\Permission\Models\Permission::create([
                'name' => $permissionValue
            ]);
        }
        $super_admin->syncPermissions($permissions);
        $user->syncPermissions([
            'announcement:read',
            'message:create',
            'message:read',
            'product:read'
        ]);

        $admin = Users::create([
            'firstname' => 'Super',
            'lastname' => 'Admin',
            'email' => 'admin@admin.com',
            'phone' => '+905555555555',
            'username' => 'admin',
            'password' => bcrypt('admin')
        ]);

        $admin->assignRole('Super Admin');

    }
}
