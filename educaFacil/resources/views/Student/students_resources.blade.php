@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recursos del Curso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        <!--

        h1 {
            text-align: center;
            animation: slideDown 1s ease-in-out;
        }
        .recursos {
            list-style: none;
            padding: 0;
        }
        .recurso {
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.5s ease-in-out forwards;
            position: relative;
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


        .recurso:nth-child(1) { animation-delay: 0.2s; }
        .recurso:nth-child(2) { animation-delay: 0.4s; }
        .recurso:nth-child(3) { animation-delay: 0.6s; }
        .recurso h2 {
            margin: 0 0 10px;
        }
        .recurso p {
            margin: 5px 0;
        }
        .fecha {
            display: block;
            font-weight: bold;
            margin-top: 10px;
        }

        .descargar-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .descargar-btn:hover {
            background-color: #218838;
            transform: scale(1.1);
        }

        /* Animaciones */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideDown {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>
<div class="container">
    <h1>Recursos del Curso</h1>
    <ul class="recursos">
        @if($resources->isEmpty())
        <li class="no-recursos">
                <h2>No hay material disponible aún</h2>   
            </li>
        @else
            @foreach ($resources as $resource)
                <li class="recurso">
                    <h2>{{ $resource->Name }}</h2> <!-- Asegúrate de usar el atributo correcto -->
                    <span class="fecha">Fecha de subida: {{ $resource->created_at->format('d/m/Y') }}</span>
                    <a href="{{ route('prueba', ['resourceId' => $resource->id]) }}" class="descargar-btn">Descargar</a>
                </li>
            @endforeach
        @endif
    </ul>
</div>


</body>
</html>

@endsection
