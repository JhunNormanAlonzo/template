<?php

namespace Database\Seeders;

use App\Models\YearLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class YearLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        YearLevel::create([
            'name' => "First Year",
        ]);

        YearLevel::create([
            'name' => "Second Year",
        ]);


        YearLevel::create([
            'name' => "Third Year",
        ]);


        YearLevel::create([
            'name' => "Fourth Year",
        ]);
    }
}
