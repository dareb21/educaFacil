@extends('layouts.app')

@section('content')
<style>
    /* Reset de márgenes y padding */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Estilo general */
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #e6f7ff;
        padding: 30px;
    }

    /* Contenedor principal */
    .container {
        display: flex;
        flex-wrap: wrap; /* Permitir que las tarjetas se muevan a nuevas filas */
        justify-content: space-evenly;
        gap: 20px;
    }

    /* Tarjetas */
    .course-card {
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        width: calc(25% - 20px); /* Ajustar para que en una fila solo haya 4 tarjetas */
        max-width: 350px;
        padding: 40px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid #f0f0f0;
    }

    .course-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    /* Título de la tarjeta */
    .course-title {
        font-size: 2rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 20px;
    }

    /* Descripción de la tarjeta */
    .course-description {
        font-size: 1.1rem;
        color: #7f8c8d;
        margin-top: 15px;
        margin-bottom: 25px;
    }

    /* Botones */
    .course-button {
        background-color: #3498db;
        color: #fff;
        padding: 12px 25px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 1.2rem;
        transition: background-color 0.3s ease;
    }

    .course-button:hover {
        background-color: #2980b9;
    }

    /* Responsividad */
    @media (max-width: 1200px) {
        .course-card {
            width: calc(33.33% - 20px); /* 3 tarjetas por fila */
        }
    }

    @media (max-width: 900px) {
        .course-card {
            width: calc(50% - 20px); /* 2 tarjetas por fila */
        }
    }

    @media (max-width: 600px) {
        .course-card {
            width: 100%; /* 1 tarjeta por fila */
        }
    }
</style>

<div class="container">
    <div class="course-card">
        <h3 class="course-title">Crear administrador</h3>
        <p class="course-description">Configura accesos y controla el sistema con privilegios de administrador.</p>
        <a href="{{ route('newAdmin') }}" class="course-button">Crear</a>
    </div>

    <div class="course-card">
        <h3 class="course-title">Crear Catedratico</h3>
        <p class="course-description">Gestiona perfiles de catedráticos y optimiza el manejo de tus cursos.</p>
        <a href="{{ route('newTeacher') }}" class="course-button">Crear</a>
    </div>

    <div class="course-card">
        <h3 class="course-title">Crear Categoria</h3>
        <p class="course-description">Organiza el contenido por categorías para facilitar el acceso y la gestión.</p>
        <a href="{{ route('newCategory') }}" class="course-button">Crear categoria</a>
    </div>

    <div class="course-card">
        <h3 class="course-title">Crear Curso</h3>
        <p class="course-description">Diseña nuevos cursos y pon a disposición de los estudiantes recursos valiosos.</p>
        <a href="{{ route('newCourse') }}" class="course-button">Crear Curso</a>
    </div>

    <div class="course-card">
        <h3 class="course-title">Crear Post</h3>
        <p class="course-description">Comparte anuncios importantes o discusiones en el grupo asignado.</p>
        <a href="{{ route('newPost') }}" class="course-button">Unirme</a>
    </div>
</div>

@endsection


