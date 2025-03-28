@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas Subidas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        
        

        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 2.5em;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
            font-size: 1.2em;
        }

        tr:hover {
            background-color: #f1f1f1;
            transition: background-color 0.3s ease;
        }

        .file-link {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .file-link:hover {
            text-decoration: underline;
        }

        .grade {
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .high-grade {
            background-color: #4caf50;
            color: white;
        }

        .low-grade {
            background-color: #ff6b6b;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Tareas Subidas</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre de la Tarea:</th>
                <th>Descripción:</th>
                <th>Puntos:</th>
                <th>Fecha Límite:</th>
                <th>Fecha Publicación:</th>
                <th>Acción:</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $hw)
            <tr>
                <td>{{$hw->Name}}</td>
        <td>{{$hw->Desc}}</td>
        <td>{{$hw->Points}}</td>
        <td>{{$hw->Line->format('d/m/Y') }}</td>
                <td>{{$hw->start->format('d/m/Y') }}</td>
                <td>
                    <a href="{{route('submits', ['hwId' => $hw->Hid]) }}" class="file-link">Ver entregas</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>

@endsection