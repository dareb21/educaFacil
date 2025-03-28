@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e3f2fd;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .post-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }
        .post-title {
            font-size: 24px;
            font-weight: bold;
            color: #1565c0;
            margin-bottom: 15px;
        }
        .post-description {
            font-size: 18px;
            color: #1e88e5;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        input, textarea {
            padding: 12px;
            border: 2px solid #90caf9;
            border-radius: 10px;
            font-size: 16px;
            width: 100%;
        }
        textarea {
            height: 150px;
        }
        button {
            background-color: #1976d2;
            color: white;
            cursor: pointer;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 10px;
            transition: background 0.3s;
        }
        button:hover {
            background-color: #1565c0;
        }
    </style>
</head>

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
<body>
    <div class="post-container">
        <div class="post-title">Crear un Nuevo Post</div>
        <form action="{{ route('createPost') }}"  method="POST">
        @csrf
            <input type="text" name="post_title" placeholder="Título del Post" required>
            <textarea name="post_description" placeholder="Descripción del Post" rows="6" required></textarea>
            <button type="submit">Publicar</button>
        </form>
    </div>
</body>
</html>


@endsection


