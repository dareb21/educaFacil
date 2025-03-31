@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Cursos Tomados</title>
    <style>
        /* Estilos CSS para el historial de cursos */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }

        .course-history-container {
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: 40px auto;
        }

        .course-history-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .no-recursos {
            background-color: #f8d7da;
            color: #721c24;
            padding: 20px;
            margin-top: 20px;
            text-align: center;
            border-radius: 5px;
            font-size: 1.2em;
            border: 1px solid #f5c6cb;
        }

        .course-history-table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .course-history-table th, .course-history-table td {
            padding: 12px;
            text-align: left;
            font-size: 16px;
            border-bottom: 1px solid #ddd;
        }

        .course-history-table th {
            background-color: rgb(77, 108, 235);
            color: white;
        }

        .course-history-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .course-history-table tr:hover {
            background-color: #ddd;
        }

        .course-history-table td {
            color: #333;
        }

        .status-completed {
            color: green;
            font-weight: bold;
        }

        .status-in-progress {
            color: orange;
            font-weight: bold;
        }

        .status-pending {
            color: red;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <div class="course-history-container">
        <h2>Historial de Cursos Tomados</h2>
        
        @if (!$courses->isEmpty())
            <table class="course-history-table">
                <thead>
                    <tr>
                        <th>Curso</th>
                        <th>Modalidad</th>
                        <th>Categoría</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Finalización</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->Course }}</td>
                            <td>{{ $course->Mode }}</td>
                            <td>{{ $course->Category }}</td>
                            <td>{{ $course->Start }}</td>
                            <td>{{ $course->End ?? 'En curso...' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="no-recursos">
                <h2>Sin asignaciones</h2>
            </div>
        @endif
    </div>
</body>
</html>
@endsection
