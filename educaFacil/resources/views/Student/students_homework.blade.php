@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignaciones del Curso</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }
        h1 {
            text-align: center;
            animation: slideDown 1s ease-in-out;
        }
        .asignaciones {
            list-style: none;
            padding: 0;
        }
        .asignacion {
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.5s ease-in-out forwards;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }
        .asignacion:nth-child(1) { animation-delay: 0.2s; }
        .asignacion:nth-child(2) { animation-delay: 0.4s; }
        .asignacion:nth-child(3) { animation-delay: 0.6s; }
        .asignacion h2 {
            margin: 0 0 10px;
        }
        .asignacion p {
            margin: 5px 0;
        }
        .fecha, .estado {
            display: block;
            font-weight: bold;
            margin-top: 10px;
        }
        .pendiente {
            background-color: #ffefef;
            border-left: 5px solid #ff6b6b;
        }
        .completada {
            background-color: #eaffea;
            border-left: 5px solid #4caf50;
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
        
        /* Animación al pasar el cursor */
        .asignacion:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        
        /* Botón de entregar */
        .btn-entregar {
            position: absolute;
            right: 20px;
            bottom: 15px;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 15px 25px;
            border-radius: 30px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        
        .btn-entregar:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }
    </style>
    @if(session('mensaje'))
    <script>
        Swal.fire({
            title: "Archivo subido.",
            text: "{{ session('mensaje') }}",
            icon: "success"
        });
    </script>
@endif

@if(session('Error'))
    <script>
        Swal.fire({
            title: "Formato no soportado.",
            text: "{{ session('Error') }}",
            icon: "error"
        });
    </script>
@endif

</head>

<body>
<div class="container">
    <h1>Asignaciones del Curso</h1>
    <ul class="asignaciones">
   
        @foreach ($hws as $hw)
            <li class="asignacion">
                <h2>{{ $hw->Name }}</h2>
                <p>{{ $hw->Desc }}</p>
                <p>Puntos: {{ $hw->Points }}</p>
                <span class="fecha">Fecha de entrega: {{ $hw->Deadline }}</span>
                
                @if($submits[$hw->id]==="No")
                <button class="btn-entregar">Entregar</button>
                <form action="{{route('submit', ['courseID'=>$hw->course_id])}}" method="POST" enctype="multipart/form-data" class="uploadForm">
                    @csrf
                    <input type="hidden" name="hw_id" value="{{ $hw->id }}">
                    <input type="file" name="archivo" class="fileInput" style="display: none;" />
                </form>
                @else
                <button class="btn-entregar">Actualizar</button>
                <form action="{{route('submit_Update', ['courseID'=>$hw->course_id])}}" method="POST" enctype="multipart/form-data" class="uploadForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="hw_id" value="{{ $hw->id }}">
                    <input type="file" name="archivo" class="fileInput" style="display: none;" />
                </form>
                @endif
            </li>
        @endforeach
    </ul>
</div>

</body>

<script>
    document.querySelectorAll('.btn-entregar').forEach((button, index) => {
        button.addEventListener('click', function() {
            // Simular clic en el input de archivo
            document.querySelectorAll('.fileInput')[index].click();
        });
    });

    document.querySelectorAll('.fileInput').forEach((input, index) => {
        input.addEventListener('change', function() {
            // Enviar el formulario automáticamente cuando se seleccione un archivo
            document.querySelectorAll('.uploadForm')[index].submit();
        });
    });
</script>

</html>
@endsection