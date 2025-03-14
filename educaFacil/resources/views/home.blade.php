@extends('layouts.app')

@section('content')

<style>
    /* Estilos generales */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Roboto', sans-serif;
        background-color: #e6f7ff;
        padding: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        justify-content: center;
    }

    .course-card {
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        width: 350px;  /* Aumenté el ancho de las tarjetas */
        padding: 40px;  /* Aumenté el padding */
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid #f0f0f0;
    }

    .course-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    .course-title {
        font-size: 2rem;  /* Aumenté el tamaño de la fuente */
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 20px;
    }

    .footer {
        margin-top: 30px;
        font-size: 14px;
        color: #777;
        text-align: center;
    }

    .footer a {
        color: #5e72e4;
        text-decoration: none;
        font-weight: bold;
    }

    .footer a:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .course-card {
            width: 100%;
            padding: 30px;
        }
    }
</style>

<div class="container">
    <div class="course-card">
        <a class="modelo__enlace" href="{{ route('myCourses') }}">
            <div class="course-title">Cursos Matriculados</div>
        </a>
    </div>

    <div class="course-card">
        <a class="modelo__enlace" href="{{ route('courses') }}">
            <div class="course-title">Cursos Disponibles</div>
        </a>
    </div>

    <div class="course-card">
        <div class="course-title">Historial de Cursos</div>
    </div>

    <div class="course-card">
    <a class="modelo__enlace" href="{{ route('Profile',['profileID'=>$user->id]) }}">
    <div class="course-title">Configuración de Perfil</div>
    </a>
    </div>

    <div class="course-card">
        <a class="modelo__enlace" href="{{ route('posts') }}">
            <div class="course-title">Eventos Importantes</div>
        </a>
    </div>
</div>

<div class="footer">
    <p>¿Necesitas ayuda? <a href="#">Contáctanos</a></p>
</div>

@endsection
