<?php

namespace Database\Seeders;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '_',
            'password' => bcrypt('password'),
        ]);
        $permissions = Permission::all();
        $role = Role::find(1);
        $role->syncPermissions($permissions);
        $user->assignRole($role);
    }
    
}
