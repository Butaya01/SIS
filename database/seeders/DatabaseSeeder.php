<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin first
        $this->call(AdminSeeder::class);

        // Create students with random data
        $this->call(StudentSeeder::class);

        // Create Subject with random data
        $this->call(SubjectSeeder::class);

        // Create a test student account
        \App\Models\User::factory()->create([
            'student_id' => '100000',
            'name' => 'Test Student',
            'email' => 'test@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password123'),
            'role' => 'student',
            'course' => 'BSIT',
            'year_level' => '1st Year',
        ]);
    }
}
