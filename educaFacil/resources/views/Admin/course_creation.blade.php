@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Administrador</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            font-size: 14px;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #5e72e4;
            outline: none;
        }

        button.submit-btn {
            width: 100%;
            padding: 12px;
            background-color: #5e72e4;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button.submit-btn:hover {
            background-color: #4e60d0;
        }

        button.submit-btn:active {
            background-color: #3e50a1;
        }
    </style>
</head>
<body>
@if(session('mensaje'))
    <script>
        Swal.fire({
            title: "Exito",
            text: "{{ session('mensaje') }}",
            icon: "success"
        });
    </script>
@endif

@if(session('Error'))
    <script>
        Swal.fire({
            title: "Error",
            text: "{{ session('Error') }}",
            icon: "error"
        });
    </script>
@endif
    <div class="form-container">
        <h2>Creacion de curso</h2>
        <form action="{{ route('createCourse') }}" method="POST">
        @csrf
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required placeholder="Nombre del curso">
            </div>

            <div class="form-group">
                <label for="desc">Descripcion de curso:</label>
                <textarea  id="desc" name="desc" required placeholder="Descripcion del curso"> </textarea>
            </div>

            <div class="form-group">
                <label for="duration">Semanas de duracion:</label>
                <input type="number" id="duration"  name="duration" min="3" required>
            </div>

            <div class="form-group">
                <label for="mode">Modalidad:</label>
                <select id="mode" name="mode" required>
                <option value="" disabled selected>Seleccionar opcion</option>
                    <option value="Live">En vivo</option>
                    <option value="Recorded">Pre-grabada</option>
                </select>
            </div>

            <div class="form-group">
                <label for="max">Cupos disponibles de estudiantes:</label>
                <input type="number" id="max" name="max" min="4" required>
            </div>

            <div class="form-group">
                <label for="start">Fecha de Inicio:</label>
                <input type="date" id="start" name="start" required>
            </div>
            <div class="form-group">
            <label for="teacher">Seleccione catedratico :</label>
            <select id="teacher" name="teacher" required>
            <option value="" disabled selected>Seleccionar opcion</option>               
            @foreach ($teachers as $teacher)
            <option value="{{$teacher->id}}">{{ $teacher->name }}</option>
            @endforeach
            </select>
            </div>

            <div class="form-group">
            <label for="category">Seleccione categoria :</label>
            <select id="category" name="category" required>
            <option value="" disabled selected>Seleccionar opcion</option>               
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{ $category->name }}</option>
            @endforeach
            </select>
            </div>


            <button type="submit" class="submit-btn">Registrar</button>
        </form>
    </div>

</body>
</html>


@endsection