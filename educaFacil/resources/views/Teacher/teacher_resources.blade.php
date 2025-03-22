@extends('layouts.app')

@section('content')


@if(session('mensaje'))
    <script>
        Swal.fire({
            title: "Tarea subida.",
            text: "{{ session('mensaje') }}",
            icon: "success"
        });
    </script>
@endif

@if(session('Error'))
    <script>
        Swal.fire({
            title: "Formato no soportado.",
            text: "{{ session('Error') }}",
            icon: "error"
        });
    </script>
@endif


<div class="container">
    <h2 class="page-title">Subir Material Didáctico</h2>
    <form action="{{ route('resources_Upload', ['cursoId' => $course->id]) }}" method="POST" enctype="multipart/form-data" class="course-card">
        @csrf

        <div class="form-group">
            <label for="file" class="label">Archivo</label>
            <input type="hidden" name="course" value="{{ $course->id }}">
            <input type="file" class="form-control" id="file" name="file" required accept="application/pdf,image/*">
        </div>

        <button type="submit" class="course-button" id="submit-btn" disabled>Subir Material</button>
    </form>
</div>

<script>
    document.getElementById('file').addEventListener('change', function() {
        document.getElementById('submit-btn').disabled = false;
    });
</script>

@endsection
