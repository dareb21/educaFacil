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
        flex-wrap: nowrap; /* No dejar que las tarjetas se muevan a la siguiente fila */
        justify-content: center;
        gap: 20px;
        overflow-x: auto; /* Permite el desplazamiento horizontal en caso de que las tarjetas no quepan */
    }

    /* Tarjetas */
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

    /* Título de la tarjeta */
    .course-title {
        font-size: 2rem;  /* Aumenté el tamaño de la fuente */
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 20px;
    }

    /* Descripción de la tarjeta */
    .course-description {
        font-size: 1.1rem;  /* Aumenté el tamaño de la descripción */
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
        font-size: 1.2rem;  /* Aumenté el tamaño del texto del botón */
        transition: background-color 0.3s ease;
    }

    .course-button:hover {
        background-color: #2980b9;
    }

    /* Responsividad */
    @media (max-width: 768px) {
        .course-card {
            width: 100%;
            padding: 50px;
        }
    }
</style>

<div class="container">
    <!-- Clases -->
    <div class="course-card">
        <h3 class="course-title">Entrar a videoconferencia</h3>
        <p class="course-description">Únete a las sesiones en vivo de tu curso.</p>
        <a href="" class="course-button">Ingresar</a>
    </div>

    <!-- Asignaciones -->
    <div class="course-card">
        <h3 class="course-title">Asignaciones</h3>
        <p class="course-description">Evalua las asignaciones de tus alumnos.</p>
        <a href="{{route('homework', ['cursoId' => $course->id] ) }}" class="course-button">Ver tareas</a>
    </div>

    <!-- Recursos -->
    <div class="course-card">
        <h3 class="course-title">Recursos</h3>
        <p class="course-description">Asigna el material didactico necesario para el curso.</p>
        <a href="#" class="course-button">Ver recursos</a>
    </div>

    <!-- Grupo de WhatsApp -->
    <div class="course-card">
        <h3 class="course-title">Grupo de WhatsApp</h3>
        <p class="course-description">Mantente comunicado con tus alumnos, asigna el grupo de whatsapp.</p>
        <a href="https://chat.whatsapp.com/TU-LINK-AQUI" class="course-button" style="background-color: #25D366;">Unirme</a>
    </div>
</div>

@endsection
