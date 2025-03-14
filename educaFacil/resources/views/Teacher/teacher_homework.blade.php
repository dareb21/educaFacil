@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Tareas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .task-container {
            max-width: 600px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .task-container h2 {
            text-align: center;
        }
        .task-form label {
            font-weight: bold;
        }
        .task-form input, .task-form textarea {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .task-form button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .task-form button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="task-container">
        <h2>Asignar Nueva Tarea</h2>
        <form action="{{route('Newhomework',['cursoId' => $course->id])}}"  method="POST" class="task-form">
        @csrf
            <label for="name">Nombre de la tarea:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="desc">Descripción:</label>
            <textarea id="desc" rows="4" name="desc" required></textarea>
            
            <label for="task-points">Puntos:</label>
            <input type="number" id="task-points" name="points" required>
            
            <label for="task-date">Fecha Límite:</label>
            <input type="date" id="task-date" name="deadline" required>
            <input type="hidden" name="course" value="{{$course->id}}">
            <button type="submit">Asignar Tarea</button>
        </form>
    </div>
</body>
</html>
@endsection
