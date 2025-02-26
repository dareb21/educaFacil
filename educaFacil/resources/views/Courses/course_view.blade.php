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

    .curso__contenedor {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .curso__titulo {
        font-size: 28px;
        color: #2c3e50;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .curso__descripcion {
        font-size: 16px;
        color: #555;
        line-height: 1.5;
        margin-bottom: 20px;
    }

    .curso__info {
        font-size: 14px;
        color: #777;
        margin-bottom: 10px;
    }

    .curso__info span {
        font-weight: bold;
        color: #333;
    }

    .curso__botones {
        margin-top: 20px;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 8px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn__inscribirse {
        background-color: #28a745;
        color: #fff;
    }

    .btn__inscribirse:hover {
        background-color: #218838;
    }

    .btn__volver {
        background-color: #007bff;
        color: #fff;
        margin-left: 10px;
    }

    .btn__volver:hover {
        background-color: #0056b3;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="curso__contenedor">
    <h2 class="curso__titulo">{{ $course->name }}</h2>
    <p class="curso__descripcion">{{ $course->desc }}</p>
    <p class="curso__info"><span>Duración:</span> {{ $course->duration }} semanas</p>
    <p class="curso__info"><span>Modalidad:</span> {{ $course->mode }}</p>
    <p class="curso__info"><span>Cupos disponibles:</span> {{ $course->free_spots }}</p>
    <p class="curso__info"><span>Fecha de Inicio:</span> {{ $course->date_start }}</p>
    <p class="curso__info"><span>Categoría:</span> {{ $course->category_name }}</p>

    <div class="curso__botones">
  <form action="{{ route('enrollment', ['courseId' => $course->id]) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn__inscribirse">Inscribirse</button>
</form>
      <a href="{{ route('courses') }}" class="btn btn__volver">Volver a Cursos</a>
    </div>
</div>

@endsection
