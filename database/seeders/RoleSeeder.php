<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role as SpatieRole;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SpatieRole::create([
            "name" => "Administrator"
        ]);

        SpatieRole::create([
            "name" => "Staff"
        ]);
    }
}
