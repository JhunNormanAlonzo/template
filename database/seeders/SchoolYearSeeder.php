<?php

namespace Database\Seeders;

use App\Models\SchoolYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SchoolYear::create([
            'name' => "2022-2023",
            'activation' => false
        ]);

        SchoolYear::create([
            'name' => "2023-2024",
            'activation' => false
        ]);

        SchoolYear::create([
            'name' => "2024-2025",
            'activation' => true
        ]);
    }
}
