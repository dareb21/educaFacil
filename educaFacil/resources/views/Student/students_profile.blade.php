@extends('layouts.app')

@section('content')
<body>
<div class="container-fluid p-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="text-center mb-4">
                <h2 class="display-4 text-primary">Editar Perfil</h2>
            </div>

            <form method="POST" action="{{route('updateProfile')}}">
                @csrf
                @method('PUT')

                <div class="form-group row mb-4">
                    <label for="name" class="col-md-3 col-form-label text-md-right">Nombre</label>
                    <div class="col-md-9">
                        <input id="name" type="text" class="form-control form-control-lg" name="name" value="{{ auth()->user()->name }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="email" class="col-md-3 col-form-label text-md-right">Correo Electrónico</label>
                    <div class="col-md-9">
                        <input id="email" type="email" class="form-control form-control-lg" name="email" value="{{ auth()->user()->email }}" required>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="phone" class="col-md-3 col-form-label text-md-right">Número Telefónico</label>
                    <div class="col-md-9">
                        <input id="phone" type="text" class="form-control form-control-lg" name="phone" value="{{ auth()->user()->phone }}">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="gender" class="col-md-3 col-form-label text-md-right">Género</label>
                    <div class="col-md-9">
                        <input id="gender" type="text" class="form-control form-control-lg" name="gender" value="{{ auth()->user()->gender }}">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="birthday" class="col-md-3 col-form-label text-md-right">Fecha de Nacimiento</label>
                    <div class="col-md-9">
                        <input id="birthday" type="date" class="form-control form-control-lg" name="birthday" value="{{ auth()->user()->birthday }}">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-lg btn-primary w-50">
                            Actualizar Perfil
                        </button>
                    </div>
                </div>

                <!-- Botón de retroceder como enlace -->
                <div class="form-group row mb-4">
                    <div class="col-md-12 text-center">
                        <a href="javascript:history.back()" class="btn btn-lg btn-secondary w-50">
                            Retroceder
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
@endsection

<style>
    /* Estilos para la fuente Nunito */
    body {
        font-family: 'Nunito', sans-serif;
        background-color: #f4f7fc;
    }

    .container-fluid {
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .form-control {
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
        background-color: #4CAF50;
        border-color: #4CAF50;
        border-radius: 10px;
        padding: 12px 20px;
    }

    .btn-primary:hover {
        background-color: #45a049;
        border-color: #45a049;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        border-radius: 10px;
        padding: 12px 20px;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #5a6268;
    }

    .form-group label {
        font-weight: 500;
    }

    .row {
        margin-bottom: 20px;
    }
</style>
