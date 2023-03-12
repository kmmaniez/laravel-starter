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

        $permission_lists = [
            'lihat barang',
            'tambah barang',
            'edit barang',
            'hapus barang',
            'lihat laporan',
            'tambah laporan',
            'edit laporan',
            'hapus laporan'
        ];
        foreach ($permission_lists as $key ) {
            # code...
            Permission::create(['name' => $key]);
        }

        // // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'owner']);
        $role1->givePermissionTo([
            'lihat laporan',
            'lihat barang',
        ]);
        
        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo([
            'lihat barang',
            'tambah barang',
            'edit barang',
            'hapus barang',
            'lihat laporan',
            'tambah laporan',
            'edit laporan',
            'hapus laporan'
        ]);

        // // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Owner Program',
            'email' => 'owner@gmail.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin Program',
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
