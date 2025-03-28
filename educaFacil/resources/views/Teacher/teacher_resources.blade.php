@extends('layouts.app')

@section('content')
    @if(session('mensaje'))
        <script>
            Swal.fire({
                title: "¡Éxito!",
                text: "{{ session('mensaje') }}",
                icon: "success",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Aceptar"
            });
        </script>
    @endif

    @if(session('Error'))
        <script>
            Swal.fire({
                title: "Error",
                text: "{{ session('Error') }}",
                icon: "error",
                confirmButtonColor: "#d33",
                confirmButtonText: "Intentar de nuevo"
            });
        </script>
    @endif

    <div class="container mt-4">
        <div class="card shadow-lg p-4 border-0 rounded">
            <h2 class="page-title text-center mb-4 text-primary">📂 Subir Material Didáctico</h2>
            <form action="{{ route('resources_Upload', ['cursoId' => $course->id]) }}" method="POST" enctype="multipart/form-data" class="course-card">
                @csrf

                <div class="form-group mb-3">
                    <label for="file" class="form-label fw-bold">Selecciona un archivo</label>
                    <input type="hidden" name="course" value="{{ $course->id }}">
                    <input type="file" class="form-control" id="file" name="file">
                    <small class="form-text text-muted">Formatos permitidos: PDF, DOCX , XLSX, TXT , PPTX.</small>
                </div>

                <div class="d-grid mt-3">
                    <button type="submit" class="btn btn-primary btn-lg shadow-sm" id="submit-btn" disabled style="background-color: #b0c4de; border-color: #b0c4de;">
                        <i class="fas fa-upload me-2"></i> Subir Material
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('file').addEventListener('change', function() {
            const submitBtn = document.getElementById('submit-btn');
            if (this.files.length) {
                submitBtn.disabled = false;
                submitBtn.style.backgroundColor = "#4682b4";
                submitBtn.style.borderColor = "#4682b4";
            } else {
                submitBtn.disabled = true;
                submitBtn.style.backgroundColor = "#b0c4de";
                submitBtn.style.borderColor = "#b0c4de";
            }
        });
    </script>
@endsection
