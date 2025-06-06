<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Admin; // Untuk pengguna admin
use App\Models\User;  // Untuk pengguna biasa (user), pastikan model ini ada dan siap

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cache permission
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $adminGuard = 'admin'; // Guard untuk model Admin
        $webGuard = 'web';   // Guard untuk model User (default Laravel)

        // --- Buat Permissions dengan Guard yang Sesuai ---
        // Nama permission tetap sama, namun kita akan buat instance terpisah jika diperlukan untuk guard berbeda.

        // Permissions untuk Admin (guard 'admin')
        Permission::firstOrCreate(['name' => 'manage_admin', 'guard_name' => $adminGuard]);
        Permission::firstOrCreate(['name' => 'manage_products', 'guard_name' => $adminGuard]);
        Permission::firstOrCreate(['name' => 'manage_orders', 'guard_name' => $adminGuard]); // Versi admin untuk manage_orders

        // Permissions untuk User (guard 'web')
        Permission::firstOrCreate(['name' => 'manage_profile', 'guard_name' => $webGuard]);
        Permission::firstOrCreate(['name' => 'manage_address', 'guard_name' => $webGuard]);
        Permission::firstOrCreate(['name' => 'manage_cart', 'guard_name' => $webGuard]);
        Permission::firstOrCreate(['name' => 'manage_orders', 'guard_name' => $webGuard]); // Versi user untuk manage_orders

        // --- Buat Roles dengan Guard yang Sesuai ---
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => $adminGuard]);
        $userRole = Role::firstOrCreate(['name' => 'user', 'guard_name' => $webGuard]);

        // --- Assign Permissions ke Roles ---

        // Permissions untuk Admin Role
        // Mengambil permission yang relevan HANYA dari adminGuard
        $adminPermissionsToAssign = Permission::where('guard_name', $adminGuard)
            ->whereIn('name', [
                'manage_admin',
                'manage_products',
                'manage_orders', // Ini akan mengambil 'manage_orders' dengan guard 'admin'
            ])->get();
        $adminRole->syncPermissions($adminPermissionsToAssign);

        // Permissions untuk User Role
        // Mengambil permission yang relevan HANYA dari webGuard
        $userPermissionsToAssign = Permission::where('guard_name', $webGuard)
            ->whereIn('name', [
                'manage_profile',
                'manage_address',
                'manage_cart',
                'manage_orders', // Ini akan mengambil 'manage_orders' dengan guard 'web'
            ])->get();
        $userRole->syncPermissions($userPermissionsToAssign);


        // --- Buat Contoh User untuk Masing-masing Role ---

        // Buat Admin User (menggunakan model App\Models\Admin)
        $adminUserInstance = Admin::firstOrCreate(
            ['email' => 'admin@example.com'], // Kriteria untuk mencari atau membuat
            [                                 // Data untuk dibuat jika tidak ditemukan
                'name' => 'Administrator',
                'username' => 'admin',    // Pastikan field 'username' ada di model Admin & migrasinya
                'password' => Hash::make('admin123'),
            ]
        );
        $adminUserInstance->assignRole($adminRole); // Role 'admin' ini sudah memiliki guard_name 'admin'

        // Buat Regular User (menggunakan model App\Models\User)
        // Pastikan model User Anda sudah menggunakan trait HasRoles dari Spatie: use Spatie\Permission\Traits\HasRoles;
        if (class_exists(User::class)) { // Cek apakah model User ada
            $regularUserInstance = User::firstOrCreate(
                ['email' => 'user@example.com'], // Kriteria untuk mencari atau membuat
                [                                 // Data untuk dibuat jika tidak ditemukan
                    'name' => 'Regular User',
                    'username' => 'Guest',
                    'password' => Hash::make('user123'),
                ]
            );
            $regularUserInstance->assignRole($userRole); // Role 'user' ini sudah memiliki guard_name 'web'
        }

        // Output informasi ke konsol (opsional, tapi membantu)
        $this->command->info('Roles and Permissions seeded successfully with original names and correct guards!');
        if (isset($adminPermissionsToAssign)) {
            $this->command->info('Admin role assigned permissions: ' . $adminPermissionsToAssign->pluck('name')->implode(', '));
        }
        if (isset($userPermissionsToAssign)) {
            $this->command->info('User role assigned permissions: ' . $userPermissionsToAssign->pluck('name')->implode(', '));
        }
        $this->command->info('Created admin user: admin@example.com (password: admin123)');
        if (class_exists(User::class) && isset($regularUserInstance)) {
            $this->command->info('Created regular user: user@example.com (password: user123)');
        }
    }
}