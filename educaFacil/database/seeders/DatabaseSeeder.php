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
   



        Category::create([
            'name' => 'Telecomunicaciones',
            'desc' => 'Categoría enfocada en redes, comunicaciones y tecnologías inalámbricas.',
        ]);

        Category::create([
            'name' => 'Base de Datos (DBA)',
            'desc' => 'Administración, modelado y optimización de bases de datos relacionales y NoSQL.',
        ]);

        Category::create([
            'name' => 'Programación Web',
            'desc' => 'Desarrollo de sitios y aplicaciones web usando diversas tecnologías.',
        ]);

        Category::create([
            'name' => 'Arquitectura',
            'desc' => 'Diseño, construcción y planificación de edificaciones e infraestructuras.',
        ]);

        Category::create([
            'name' => 'Derecho',
            'desc' => 'Estudios y prácticas legales en diferentes áreas del derecho.',
        ]);

        Category::create([
            'name' => 'Ingeniería Industrial',
            'desc' => 'Optimización de procesos, gestión de calidad y eficiencia en la industria.',
        ]);


        Course::create([
            'name' => 'Redes y Telecomunicaciones',
            'desc' => 'Curso sobre infraestructura de redes, protocolos y telecomunicaciones modernas.',
            'duration' => 10, // en semanas
            'mode' => 'En vivo',
            'free_spots' => 25,
            'date_start' => '2025-04-01',
            'teacher_id' => 2, // Asegúrate de que este ID exista en la tabla teachers
            'category_id' => 1, // Telecomunicaciones
        ]);

        Course::create([
            'name' => 'Administración de Bases de Datos',
            'desc' => 'Curso sobre modelado, gestión y optimización de bases de datos SQL y NoSQL.',
            'duration' => 12,
            'mode' => 'Pregrabado',
            'free_spots' => 30,
            'date_start' => '2025-05-10',
            'teacher_id' => 3,
            'category_id' => 2, // DBA
        ]);

        Course::create([
            'name' => 'Desarrollo Web Full Stack',
            'desc' => 'Aprende HTML, CSS, JavaScript, Laravel y bases de datos para crear aplicaciones web completas.',
            'duration' => 14,
            'mode' => 'En vivo',
            'free_spots' => 20,
            'date_start' => '2025-06-15',
            'teacher_id' => 4,
            'category_id' => 3, // Programación Web
        ]);

        Course::create([
            'name' => 'Arquitectura Sostenible',
            'desc' => 'Explora diseños y materiales ecológicos para edificaciones eficientes.',
            'duration' => 8,
            'mode' => 'Pregrabado',
            'free_spots' => 15,
            'date_start' => '2025-07-01',
            'teacher_id' => 5,
            'category_id' => 4, // Arquitectura
        ]);

        Course::create([
            'name' => 'Derecho Corporativo',
            'desc' => 'Curso sobre regulaciones y leyes aplicadas a empresas y negocios.',
            'duration' => 6,
            'mode' => 'En vivo',
            'free_spots' => 10,
            'date_start' => '2025-08-10',
            'teacher_id' => 6,
            'category_id' => 5, // Derecho
        ]);

        Course::create([
            'name' => 'Optimización de Procesos Industriales',
            'desc' => 'Curso sobre mejora de procesos, lean manufacturing y calidad industrial.',
            'duration' => 9,
            'mode' => 'Pregrabado',
            'free_spots' => 18,
            'date_start' => '2025-09-05',
            'teacher_id' => 7,
            'category_id' => 6, // Ingeniería Industrial
        ]);


        Course::create([
            'name' => 'Optimización de Consultas SQL',
            'desc' => 'Curso avanzado sobre cómo mejorar el rendimiento de las consultas SQL en bases de datos grandes.',
            'duration' => 6, // en semanas
            'mode' => 'En vivo',
            'free_spots' => 20,
            'date_start' => '2025-09-15',
            'teacher_id' => 3, // Asegúrate de que este ID exista en la tabla teachers
            'category_id' => 2, // DBA
        ]);
        
        Course::create([
            'name' => 'Introducción a NoSQL',
            'desc' => 'Curso para entender bases de datos NoSQL, su arquitectura y cuándo utilizarlas.',
            'duration' => 8,
            'mode' => 'Pregrabado',
            'free_spots' => 25,
            'date_start' => '2025-10-01',
            'teacher_id' => 3,
            'category_id' => 2, // DBA
        ]);

    }
}
