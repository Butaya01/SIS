<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\User;
use App\Models\Subject;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::with(['student', 'subject'])->get();
        return view('admin.enrollments.index', compact('enrollments'));
    }

    public function create()
    {
        // Get only users with role='student'
        $students = User::where('role', 'student')->get();
        $subjects = Subject::all();
        $enrollments = Enrollment::all();

        return view('admin.enrollments.create', compact('students', 'subjects', 'enrollments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id,role,student',
            'subject_id' => 'required|exists:subjects,id',
            'semester' => 'required|string'
        ]);

        // Get the student's course from the users table
        $student = User::find($request->student_id);
        
        // Create enrollment with the student's course
        Enrollment::create([
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id,
            'course' => $student->course, // Use the student's course from their profile
            'semester' => $request->semester
        ]);

        return redirect()->route('admin.enrollments')->with('success', 'Enrollment created successfully.');
    }

    public function edit(Enrollment $enrollment)
    {
        $students = User::where('role', 'student')->get();
        $subjects = Subject::all();
        return view('admin.enrollments.edit', compact('enrollment', 'students', 'subjects'));
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id,role,student',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        $enrollment->update($request->all());

        return redirect()->route('admin.enrollments')->with('success', 'Enrollment updated successfully.');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()->route('admin.enrollments')->with('success', 'Enrollment deleted successfully.');
    }
}
