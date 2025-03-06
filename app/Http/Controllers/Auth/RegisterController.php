<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:student'],
        ];

        // Add validation rules for student fields
        if ($data['role'] === 'student') {
            $rules['student_id'] = ['required', 'string', 'max:255', 'unique:users'];
            $rules['course'] = ['required', 'string', 'in:BSIT,BSCS,BSIS,BSEMC'];
            $rules['year_level'] = ['required', 'string', 'in:1st Year,2nd Year,3rd Year,4th Year'];
        }

        return Validator::make($data, $rules);
    }

    protected function create(array $data)
    {
        $userData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'student'
        ];

        // Add student-specific data
        if ($data['role'] === 'student') {
            $userData['student_id'] = $data['student_id'];
            $userData['course'] = $data['course'];
            $userData['year_level'] = $data['year_level'];
        }

        return User::create($userData);
    }
}