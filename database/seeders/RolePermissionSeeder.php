<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $permission = Permission::firstOrCreate(['name' => 'view dashboard']);
        $admin->givePermissionTo($permission);
        $user = User::where('email', 'admin@example.com')->first();
        if ($user) {
            $user->assignRole('admin');
        }
    }
}
