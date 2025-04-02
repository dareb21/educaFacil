@extends('layouts.app')

@section('content')

<style>
    /* Estilos generales */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #eef2f7;
        margin: 0;
        padding: 0;
    }

    .curso__contenedor {
        max-width: 800px;
        margin: 50px auto;
        padding: 30px;
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: all 0.3s ease-in-out;
        position: relative;
    }

    .curso__contenedor:hover {
        box-shadow: 0px 8px 22px rgba(0, 0, 0, 0.15);
    }

    .curso__titulo {
        font-size: 32px;
        color: #2c3e50;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .curso__descripcion {
        font-size: 18px;
        color: #555;
        line-height: 1.8;
        margin-bottom: 25px;
    }

    .curso__info {
        font-size: 15px;
        color: #666;
        margin-bottom: 12px;
    }

    .curso__info span {
        font-weight: bold;
        color: #222;
    }

    .curso__botones {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 25px;
    }

    .btn {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 12px 24px;
        font-size: 17px;
        font-weight: 600;
        border-radius: 10px;
        text-decoration: none;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .btn__inscribirse {
        background-color: #28a745;
        color: #fff;
    }

    .btn__inscribirse:hover {
        background-color: #218838;
        transform: translateY(-2px);
    }

    .btn__volver {
        background-color: #007bff;
        color: #fff;
    }

    .btn__volver:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
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
    <p class="curso__info"><span>Horario:</span> {{ $course->Day }}  {{ $course->Hour }}</p>
    <p class="curso__info"><span>Categoría:</span> {{ $course->category_name }}</p>

    @if($auth)
    <div class="curso__botones">
        <form action="{{ route('enrollment', ['courseId' => $course->id]) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn__inscribirse">Inscribirse</button>
        </form>
        <a href="{{ route('courses') }}" class="btn btn__volver">Volver a Cursos</a>
    </div>
</div>
@else
<a href="{{ route('login') }}" class="btn btn__volver">Inscribase YA!</a>
@endif

@endsection
