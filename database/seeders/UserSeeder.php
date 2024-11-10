<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => "Michael Maglanque",
            'email' => "mmaglanq@gnc.edu.ph",
            'password' => Hash::make('admin123')
        ]);

        $role = Role::where('name', "Administrator")->first();

        $user->syncRoles([$role]);


        $user = User::create([
            'name' => "Jhun Norman Alonzo",
            'email' => "alonzojhunnorman@gmail.com",
            'password' => Hash::make('admin123')
        ]);

        $role = Role::where('name', "Administrator")->first();

        $user->syncRoles($role);

        $permissions = Permission::all();
        $user->syncPermissions($permissions);
    }
}
