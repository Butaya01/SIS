<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        
        // Add a global scope to only get students
        static::addGlobalScope('role', function ($query) {
            $query->where('role', 'student');
        });
    }

    protected $fillable = [
        'student_id',
        'name',
        'email',
        'course',
        'year_level'
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'student_id', 'id');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class, 'student_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($student) {
            $student->enrollments()->delete();
            $student->grades()->delete();
        });
    }
}