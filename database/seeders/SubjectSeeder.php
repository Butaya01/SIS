<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        $subjects = [
            // Programming Subjects
            [
                'subject_code' => 'CC101',
                'name' => 'Introduction to Programming',
                'description' => 'Basic concepts of programming using Python',
                'units' => 3
            ],
            [
                'subject_code' => 'CC102',
                'name' => 'Object-Oriented Programming',
                'description' => 'OOP concepts using Java/C++',
                'units' => 3
            ],
            [
                'subject_code' => 'CC103',
                'name' => 'Web Development',
                'description' => 'HTML, CSS, JavaScript, and PHP',
                'units' => 3
            ],
            [
                'subject_code' => 'CC104',
                'name' => 'Mobile App Development',
                'description' => 'Android and iOS development',
                'units' => 3
            ],
            
            // Database Subjects
            [
                'subject_code' => 'DB101',
                'name' => 'Database Management Systems',
                'description' => 'SQL and database design',
                'units' => 3
            ],
            [
                'subject_code' => 'DB102',
                'name' => 'Advanced Database Systems',
                'description' => 'NoSQL and data warehousing',
                'units' => 3
            ],

            // Networking Subjects
            [
                'subject_code' => 'NET101',
                'name' => 'Computer Networks',
                'description' => 'Network protocols and architecture',
                'units' => 3
            ],
            [
                'subject_code' => 'NET102',
                'name' => 'Network Security',
                'description' => 'Security principles and cryptography',
                'units' => 3
            ],

            // Business Subjects
            [
                'subject_code' => 'BUS101',
                'name' => 'Business Process Management',
                'description' => 'Understanding business workflows and processes',
                'units' => 3
            ],
            [
                'subject_code' => 'BUS102',
                'name' => 'IT Project Management',
                'description' => 'Managing IT projects and teams',
                'units' => 3
            ],
            [
                'subject_code' => 'BUS103',
                'name' => 'Business Analytics',
                'description' => 'Data analysis for business decisions',
                'units' => 3
            ],
            [
                'subject_code' => 'BUS104',
                'name' => 'E-Commerce Systems',
                'description' => 'Online business and digital marketing',
                'units' => 3
            ],

            // Core Computer Science
            [
                'subject_code' => 'CS101',
                'name' => 'Data Structures and Algorithms',
                'description' => 'Fundamental programming concepts and problem-solving',
                'units' => 3
            ],
            [
                'subject_code' => 'CS102',
                'name' => 'Operating Systems',
                'description' => 'Computer system management and processes',
                'units' => 3
            ],
            [
                'subject_code' => 'CS103',
                'name' => 'Software Engineering',
                'description' => 'Software development lifecycle and methodologies',
                'units' => 3
            ],

            // Emerging Technologies
            [
                'subject_code' => 'ET101',
                'name' => 'Artificial Intelligence',
                'description' => 'Machine learning and AI applications',
                'units' => 3
            ],
            [
                'subject_code' => 'ET102',
                'name' => 'Cloud Computing',
                'description' => 'Cloud services and deployment',
                'units' => 3
            ],
            [
                'subject_code' => 'ET103',
                'name' => 'Internet of Things',
                'description' => 'Connected devices and automation',
                'units' => 3
            ],
            [
                'subject_code' => 'ET104',
                'name' => 'Cybersecurity',
                'description' => 'Information security and ethical hacking',
                'units' => 3
            ],
            [
                'subject_code' => 'ET105',
                'name' => 'Data Science',
                'description' => 'Big data analytics and visualization',
                'units' => 3
            ],

            // Business IT Integration
            [
                'subject_code' => 'BIT101',
                'name' => 'Enterprise Systems',
                'description' => 'ERP and business information systems',
                'units' => 3
            ],
            [
                'subject_code' => 'BIT102',
                'name' => 'Business Intelligence',
                'description' => 'Data-driven business strategies',
                'units' => 3
            ],
            [
                'subject_code' => 'BIT103',
                'name' => 'Digital Marketing',
                'description' => 'Online marketing strategies and analytics',
                'units' => 3
            ],
            [
                'subject_code' => 'BIT104',
                'name' => 'Information Systems Management',
                'description' => 'IT governance and strategy',
                'units' => 3
            ]
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
} 