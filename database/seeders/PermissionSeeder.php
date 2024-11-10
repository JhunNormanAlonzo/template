<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'name' => 'accept payments'
        ]);


        // Fee
        Permission::create([
            'name' => 'access fees'
        ]);

        Permission::create([
            'name' => 'view fees'
        ]);

        Permission::create([
            'name' => 'create fees'
        ]);

        Permission::create([
            'name' => 'edit fees'
        ]);

        Permission::create([
            'name' => 'delete fees'
        ]);
        // End Fee


        // Student
        Permission::create([
            'name' => 'access students'
        ]);

        Permission::create([
            'name' => 'view students'
        ]);

        Permission::create([
            'name' => 'create students'
        ]);

        Permission::create([
            'name' => 'edit students'
        ]);

        Permission::create([
            'name' => 'delete students'
        ]);
        // End Student


        // Course
        Permission::create([
            'name' => 'access courses'
        ]);

        Permission::create([
            'name' => 'view courses'
        ]);

        Permission::create([
            'name' => 'create courses'
        ]);

        Permission::create([
            'name' => 'edit courses'
        ]);

        Permission::create([
            'name' => 'delete courses'
        ]);
        // End Course

        // School Year
        Permission::create([
            'name' => 'access school years'
        ]);

        Permission::create([
            'name' => 'view school years'
        ]);

        Permission::create([
            'name' => 'create school years'
        ]);

        Permission::create([
            'name' => 'edit school years'
        ]);

        Permission::create([
            'name' => 'delete school years'
        ]);
        // End School Year


        // Log
        Permission::create([
            'name' => 'access logs'
        ]);
        // End Log

    }
}
