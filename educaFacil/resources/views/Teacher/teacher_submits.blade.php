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

        .file-links {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .file-link {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .file-link:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }

        .file-link:active {
            background-color: #004085;
            transform: translateY(0);
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


    </style>
</head>
<body>

@if(session('mensaje'))
    <script>
        Swal.fire({
            title: "Puntuaje con exito.",
            text: "{{ session('mensaje') }}",
            icon: "success"
        });
    </script>
@endif

@if(session('Error'))
    <script>
        Swal.fire({
            title: "Nota no valida.",
            text: "{{ session('Error') }}",
            icon: "error"
        });
    </script>
@endif


<div class="container">
    <h1>Tareas Subidas</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre Alumno:</th>
                <th># Alumno:</th>
                <th>Fecha Entregado:</th>
                <th>Puntos</th>  
                <th>Acción:</th>
            </tr>
        </thead>
        <tbody>
    @if(!$results->isEmpty())
        @foreach($results as $hw)
            <tr>
                <td>{{ $hw->Name }}</td>
                <td>{{ $hw->Estudiante }}</td>
                <td>{{ $hw->Entregado }}</td>
                <td>{{ $hw->PuntosESTU ?? 0 }} / {{ $hw->PuntosTAREA }}</td>
                <td>
                    <div class="file-links">
                        <a href="{{ route('download', ['subId' => $hw->Sub_id]) }}" class="file-link">Descargar Documento</a>
                        <a href="{{ route('evaluateThis', ['subId' => $hw->Sub_id]) }}" class="nota-link">Asignar Nota</a>
                    </div>
                </td>
            </tr>
    
</tbody>
</div>
                </td>
            </tr>            
            @endforeach

            @else
        <tr>
            <td colspan="5" class="no-recursos">
                <h2>No hay material disponible aún</h2>
            </td>
        </tr>
    @endif
        </tbody>
    </table>
</div>
<script>
    document.querySelectorAll(".nota-link").forEach(function(link) {
        link.addEventListener("click", function(event) {
            event.preventDefault(); // Detiene el comportamiento predeterminado del enlace

            let userInput = prompt("Ingresa nota a asignar: }}"); // Pide la nota al usuario

            if (userInput !== null) {
                let baseUrl = this.href; // Obtiene la URL base del enlace
                let newUrl = baseUrl + "?nota=" + encodeURIComponent(userInput); // Crea la nueva URL con la nota
                window.location.href = newUrl; // Redirige a la nueva URL
            }
            
        })
        
    });
</script>
</body>
</html>
@endsection