<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class StudentSeeder extends Seeder
{
    public function run()
    {
        // Define available courses and year levels
        $courses = [
            'BSIT', 'BSCS', 'BSIS', 'BSEMC', 'BSCE', 
            'BSCpE', 'ACT', 'DICT', 'BSDA'
        ];

        $yearLevels = [
            '1st Year', '2nd Year', '3rd Year', '4th Year'
        ];

        // Create 50 students with random courses and year levels
        for ($i = 0; $i < 50; $i++) {
            User::factory()->create([
                'role' => 'student',
                'password' => Hash::make('password123'),
                'course' => Arr::random($courses),
                'year_level' => Arr::random($yearLevels),
                'student_id' => sprintf('%06d', rand(100000, 999999)) // Random 6-digit student ID
            ]);
        }
    }
}
