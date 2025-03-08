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
        
        .container {
            width: 90%;
            max-width: 900px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
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
    </style>
</head>
<body>

<div class="container">
    <h1>Tareas Subidas</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre Alumno:</th>
                <th># Alumno:</th>
                <th>Fecha Entregado:</th>
                <th>Acción:</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $hw)
            <tr>
                <td>{{$hw->Name}}</td>
                <td>{{$hw->Estudiante}}</td>
                <td>{{$hw->Entregado}}</td>
                <td>
                    <div class="file-links">
                    <a href="{{route('download', ['subId' => $hw->Sub_id]) }}" class="file-link">Descargar Documento</a>
                        <a href="" class="file-link">Asignar Nota</a>
                    </div>
                </td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
