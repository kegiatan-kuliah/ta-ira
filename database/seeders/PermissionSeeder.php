<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'tambah jenis surat']);
        Permission::create(['name' => 'lihat jenis surat']);
        Permission::create(['name' => 'edit jenis surat']);
        Permission::create(['name' => 'hapus jenis surat']);

        Permission::create(['name' => 'tambah sifat surat']);
        Permission::create(['name' => 'lihat sifat surat']);
        Permission::create(['name' => 'edit sifat surat']);
        Permission::create(['name' => 'hapus sifat surat']);

        Permission::create(['name' => 'tambah petugas']);
        Permission::create(['name' => 'lihat petugas']);
        Permission::create(['name' => 'edit petugas']);
        Permission::create(['name' => 'hapus petugas']);

        Permission::create(['name' => 'tambah surat keluar']);
        Permission::create(['name' => 'lihat surat keluar']);
        Permission::create(['name' => 'edit surat keluar']);
        Permission::create(['name' => 'hapus surat keluar']);

        Permission::create(['name' => 'tambah surat masuk']);
        Permission::create(['name' => 'lihat semua surat masuk']);
        Permission::create(['name' => 'lihat surat masuk']);
        Permission::create(['name' => 'edit surat masuk']);
        Permission::create(['name' => 'hapus surat masuk']);
        Permission::create(['name' => 'disposisi surat masuk']);

        Permission::create(['name' => 'tambah akses']);
        Permission::create(['name' => 'lihat akses']);
        Permission::create(['name' => 'edit akses']);
        Permission::create(['name' => 'hapus akses']);

        $role = Role::create(['name' => 'super']);
        $role->syncPermissions([
            'tambah jenis surat',
            'lihat jenis surat',
            'edit jenis surat',
            'hapus jenis surat',

            'tambah sifat surat',
            'lihat sifat surat',
            'edit sifat surat',
            'hapus sifat surat',

            'tambah petugas',
            'lihat petugas',
            'edit petugas',
            'hapus petugas',

            'tambah akses',
            'lihat akses',
            'edit akses',
            'hapus akses',

            'tambah petugas',
            'lihat petugas',
            'edit petugas',
            'hapus petugas',

            'tambah surat masuk',
            'lihat surat masuk',
            'lihat semua surat masuk',
            'edit surat masuk',
            'hapus surat masuk',
            'disposisi surat masuk',

            'tambah surat keluar',
            'lihat surat keluar',
            'edit surat keluar',
            'hapus surat keluar',
        ]);

        $user = \App\Models\User::create([
            'name' => 'Super User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456789'),
            'role' => '',
            'is_active' => true
        ]);
        $user->assignRole($role);
        
    }
}
