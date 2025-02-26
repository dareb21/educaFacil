@extends('layouts.app')

@section('content')

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

    .container {
        background-color: #fff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 800px;
        text-align: center;
    }

    h2 {
        font-size: 26px;
        margin-bottom: 30px;
        color: #333;
    }

    .course-list {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .course-card {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        width: 45%;
        box-sizing: border-box;
        transition: background-color 0.3s, transform 0.3s;
        text-align: center;
    }

    .course-card:hover {
        background-color: #e8e8e8;
        transform: translateY(-5px);
    }

    .course-title {
        font-size: 20px;
        color: #333;
        margin-bottom: 10px;
    }

    .footer {
        margin-top: 30px;
        font-size: 14px;
        color: #777;
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
        }
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Bienvenido, Nombre Alumno</h2>

                    <div class="course-list">
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
                            <div class="course-title">Configuración de Perfil</div>
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
