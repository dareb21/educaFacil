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
        font-size: 36px;
        color: #2c3e50;
        margin-bottom: 30px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .productos__grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
        justify-content: center;
    }

    .producto {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        padding: 25px;
        text-align: center;
        cursor: pointer;
    }

    .producto:hover {
        transform: translateY(-8px);
        box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.15);
    }

    .producto__contenido {
        text-align: center;
        padding: 10px;
    }

    .producto__nombre {
        font-size: 24px;
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 20px;
        text-transform: uppercase;
    }

    .producto__info {
        font-size: 14px;
        color: #777;
        margin-bottom: 12px;
    }

    .producto__info span {
        font-weight: bold;
        color: #333;
    }

    .modelo__enlace {
        display: inline-block;
        margin-top: 15px;
        padding: 12px 25px;
        font-size: 18px;
        font-weight: bold;
        color: #fff;
        background-color: #007bff;
        border-radius: 8px;
        text-decoration: none;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .modelo__enlace:hover {
        background-color: #0056b3;
        transform: translateY(-3px);
    }

    /* Estilos del dropdown y el botón */
    .dropdown {
        margin-bottom: 30px;
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .dropdown select, .dropdown button {
        padding: 12px 20px;
        font-size: 16px;
        border-radius: 8px;
        border: 2px solid #ccc;
        background-color: #ffffff;
        color: #333;
        transition: border-color 0.3s ease;
    }

    .dropdown select:focus, .dropdown button:focus {
        outline: none;
        border-color: #007bff;
    }

    /* Media queries */
    @media (max-width: 768px) {
        .productos__heading {
            font-size: 28px;
        }

        .producto {
            padding: 15px;
        }

        .modelo__enlace {
            font-size: 16px;
            padding: 10px 20px;
        }

        .dropdown select, .dropdown button {
            width: 200px;
        }
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

@if(session('Error'))
    <script>
        Swal.fire({
            title: "Acción NO permitida",
            text: "{{ session('Error') }}",
            icon: "error"
        });
    </script>
@endif

<main class="productos productos__contenedor">
    <h2 class="productos__heading">Cursos Disponibles</h2>

    <!-- Formulario de filtro -->
    <div class="dropdown">
    <form action="{{ route('coursesFilter') }}" method="GET">
        <select name="categoryId" id="category">
            <option value="" disabled selected >Selecciona una categoría</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <button type="submit">Buscar</button>
    </form>
</div>


    <div class="productos__grid">
        @foreach ($courses as $course)
        <div class="producto">
            <div class="producto__contenido">
                <h3 class="producto__nombre">{{ $course->name }}</h3>
                <p class="producto__info"><span>Duración:</span> {{ $course->duration }} semanas</p>
                <p class="producto__info"><span>Modalidad:</span> {{ $course->mode }}</p>
                <p class="producto__info"><span>Cupos disponibles:</span> {{ $course->free_spots }}</p>
                <p class="producto__info"><span>Inicio:</span> {{ $course->date_start }}</p>
                <p class="producto__info"><span>Horario:</span> {{ $course->Day }}  {{ $course->Hour }} </p>
                <p class="producto__info"><span>Categoría:</span> {{ $course->category_name }}</p>
                <a class="modelo__enlace" href="{{ route('coursesView', ['courseId' => $course->id]) }}">Ver Curso</a>
            </div>
        </div>
        @endforeach
    </div>
</main>

@endsection
