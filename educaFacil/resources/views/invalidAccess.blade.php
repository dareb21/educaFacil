@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Denegado</title>
    <style>
        /* Estilos CSS */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f2f2f2;
        }

        .error-container {
            text-align: center;
            background: white;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .error-container h1 {
            color: #e74c3c;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .error-container p {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: #555;
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            color: white;
            background-color: #3498db;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>⛔ Acceso Denegado ⛔</h1>
        <p>No tienes permiso para acceder a este nivel.</p>
        <a href="/home" class="back-button">Volver al inicio</a>
    </div>
</body>
</html>
@endsection