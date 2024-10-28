<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
//            "year_level_id" => 1,
            "name" => "BSIT",
            "description" => "Bachelor of Science in Information Technology",
        ]);

        Course::create([
//            "year_level_id" => 1,
            "name" => "BSCrim",
            "description" => "Bachelor of Science in Criminology",
        ]);

//        Course::create([
//            "year_level_id" => 2,
//            "name" => "BSIT",
//            "description" => "Bachelor of Science in Information Technology",
//        ]);
//
//        Course::create([
//            "year_level_id" => 2,
//            "name" => "BSCrim",
//            "description" => "Bachelor of Science in Criminology",
//        ]);
//
//
//        Course::create([
//            "year_level_id" => 3,
//            "name" => "BSIT",
//            "description" => "Bachelor of Science in Information Technology",
//        ]);
//
//        Course::create([
//            "year_level_id" => 3,
//            "name" => "BSCrim",
//            "description" => "Bachelor of Science in Criminology",
//        ]);
//
//        Course::create([
//            "year_level_id" => 4,
//            "name" => "BSIT",
//            "description" => "Bachelor of Science in Information Technology",
//        ]);
//
//        Course::create([
//            "year_level_id" => 4,
//            "name" => "BSCrim",
//            "description" => "Bachelor of Science in Criminology",
//        ]);
    }
}
