<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Teacher;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
   



        Course::create([
            'name' => 'Web Development 101',
            'desc' => 'An introductory course to web development, covering HTML, CSS, and JavaScript.',
            'duration' => 13, // duración en horas
            'mode' => 'Live',
            'free_spots' => 30,
            'date_start' => '2025-04-01',
            'teacher_id' => 4, // Este id debe existir en la tabla de teachers
            'category_id' => 1, // Este id debe existir en la tabla de categories
        ]);

        Course::create([
            'name' => 'Advanced Python Programming',
            'desc' => 'A deep dive into Python programming, covering advanced concepts and libraries.',
            'duration' => 4,
            'mode' => 'Recorded',
            'free_spots' => 20,
            'date_start' => '2025-05-10',
            'teacher_id' => 5,
            'category_id' => 3,
        ]);

        Course::create([
            'name' => 'Data Science with R',
            'desc' => 'Learn data science concepts and techniques using R programming.',
            'duration' => 20,
            'mode' => 'Live',
            'free_spots' => 25,
            'date_start' => '2025-06-15',
            'teacher_id' => 6,
            'category_id' => 2,
        ]);

        Course::create([
            'name' => 'Digital Marketing Fundamentals',
            'desc' => 'Explore the key concepts of digital marketing, including SEO, PPC, and social media.',
            'duration' => 6,
            'mode' => 'Recorded',
            'free_spots' => 50,
            'date_start' => '2025-07-20',
            'teacher_id' => 5,
            'category_id' => 4,
        ]);
    }
}
