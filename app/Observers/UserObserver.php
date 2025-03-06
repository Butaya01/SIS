<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Log;

class UserObserver
{
    public function created(User $user)
    {
        Log::info('User created with role: ' . $user->role);

        if ($user->role === 'student') {
            try {
                // Convert the user's ID to a student ID format (you can modify this format)
                $studentId = sprintf('%06d', $user->id); // This will create a 6-digit student ID

                Student::create([
                    'student_id' => $studentId, // Use the generated student ID
                    'name' => $user->name,
                    'email' => $user->email,
                    'course' => $user->course ?? 'BSIT', // Provide a default value if null
                    'year_level' => $user->year_level ?? '1st Year' // Provide a default value if null
                ]);
                
                // Update the user with the generated student_id
                $user->update(['student_id' => $studentId]);

                Log::info('Student record created successfully with ID: ' . $studentId);
            } catch (\Exception $e) {
                Log::error('Failed to create student record: ' . $e->getMessage());
            }
        }
    }
} 