@extends('layouts.app')

@section('content')

<style>
    /* Estilos generales */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
    }

    .productos__contenedor {
        max-width: 1200px;
        margin: 40px auto;
        padding: 20px;
        text-align: center;
    }

    .productos__heading {
        font-size: 32px;
        color: #2c3e50;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .productos__grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        justify-content: center;
    }

    .producto {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        padding: 20px;
        text-align: center;
    }

    .producto:hover {
        transform: translateY(-5px);
        box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
    }

    .producto__contenido {
        text-align: center;
    }

    .producto__nombre {
        font-size: 22px;
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .producto__descripcion {
        font-size: 16px;
        color: #555;
        line-height: 1.5;
        margin-bottom: 10px;
    }

    .producto__info {
        font-size: 14px;
        color: #777;
        margin-bottom: 8px;
    }

    .producto__info span {
        font-weight: bold;
        color: #333;
    }

    .modelo__enlace {
        display: inline-block;
        margin-top: 12px;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        color: #fff;
        background-color: #007bff;
        border-radius: 8px;
        text-decoration: none;
        transition: background 0.3s ease;
    }

    .modelo__enlace:hover {
        background-color: #0056b3;
    }
</style>
@if(session('mensaje'))
    <script>
        Swal.fire({
            title: "Inscripción realizada",
            text: "{{ session('mensaje') }}",
            icon: "success"
        });
    </script>
@endif

<main class="productos productos__contenedor">
    <h2 class="productos__heading">Cursos Disponibles</h2>

    <div class="productos__grid">
        @foreach ($courses as $course)
        <div class="producto">
            <div class="producto__contenido">
                <h3 class="producto__nombre">{{ $course->name }}</h3>
                
                <p class="producto__info"><span>Duración:</span> {{ $course->duration }} semanas</p>
                <p class="producto__info"><span>Modalidad:</span> {{ $course->mode }}</p>
                <p class="producto__info"><span>Cupos disponibles:</span> {{ $course->free_spots }}</p>
                <p class="producto__info"><span>Inicio:</span> {{ $course->date_start }}</p>
                <p class="producto__info"><span>Categoría:</span> {{ $course->category_name }}</p>
                <a class="modelo__enlace" href="{{route('coursesView', ['courseId' => $course->id] ) }}">Ver Curso</a>
            </div>
        </div>
        @endforeach
</main>



@endsection
