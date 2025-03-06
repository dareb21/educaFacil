@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Cursos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #e6f7ff;
            padding: 30px;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        .course-card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 350px;  /* Aumenté el ancho de las tarjetas */
            padding: 40px;  /* Aumenté el padding */
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #f0f0f0;
        }

        .course-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .course-title {
            font-size: 2rem;  /* Aumenté el tamaño de la fuente */
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .course-description {
            font-size: 1.1rem;  /* Aumenté el tamaño de la descripción */
            color: #7f8c8d;
            margin-top: 15px;
            margin-bottom: 25px;
        }

        .course-button {
            background-color: #3498db;
            color: #fff;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1.2rem;  /* Aumenté el tamaño del texto del botón */
            transition: background-color 0.3s ease;
        }

        .course-button:hover {
            background-color: #2980b9;
        }

        @media (max-width: 768px) {
            .course-card {
                width: 100%;
                padding: 50px;
            }
        }
    </style>
</head>
<body>


    <div class="container">
        @foreach($courses as $course)
            <div class="course-card">
                <h3 class="course-title">{{ $course->Course }}</h3>
                <p class="course-description">Curso disponible para estudiantes. ¡Haz clic para más detalles!</p>
                <a href="{{route('dashboard', ['myCourseId' => $course->id] ) }}" class="course-button">Ver más</a>
            </div>
        @endforeach
    </div>
</body>
</html>
@endsection
