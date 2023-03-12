<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // permission lists
        $permission_lists = [
            'tambah data',
            'edit data',
            'hapus data'
        ];
        foreach ($permission_lists as $key ) {
            Permission::create(['name' => $key]);
        }

        // create owner role and assign the permissions
        $role1 = Role::create(['name' => 'owner']);
        $role1->givePermissionTo([
            'tambah data',
            'edit data',
            'hapus data'
        ]);
        
        // create admin role and assign the permissions
        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo([
            'tambah data',
            'edit data'
        ]);

        // create owner
        $user = \App\Models\User::factory()->create([
            'name'  => 'Owner Program',
            'email' => 'owner@gmail.com',
        ]);
        $user->assignRole($role1);

        // create admin
        $user = \App\Models\User::factory()->create([
            'name'  => 'Admin Program',
            'email' => 'admin@gmail.com',
        ]);
        $user->assignRole($role2);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
